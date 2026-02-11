<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;



class CartController extends Controller
{
    public function addToCart($id)
    {
        // Logic to add the product with the given $id to the cart
        // This is a placeholder implementation
        $product = Product::find($id);

        $cart = session()->get('cart', []);


            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->photo,
                "description" => $product->description,
            ];
            }

            session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(Request $request)
    {
        return view('cart');
    }

 public function cartUpdate(Request $request)
     {
        info($request->all());
        $cart = session("cart");

        $cart[$request->product_id]["quantity"] = $request->quantity;

        session()->put("cart", $cart);
        $view = view("cartProducts")->render();
        return response()->json(["success" => 1]);
     }
    
   public function order(Request $request)
{
    $amount = 0;

    foreach (session("cart") as $key => $value) {
        $amount += $value["quantity"] * $value["price"];
    }

    $order = Order::create([
        "user_id" => auth()->id() ?? null,
        "amount"  => $amount
    ]);

    foreach (session("cart") as $key => $value) {
        $order->products()->create([
            "product_id" => $key,
            "quantity" => $value["quantity"],
            "price" => $value["price"]
        ]);
    }

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $successURL = route('order.success').'?session_id={CHECKOUT_SESSION_ID}&order_id='.$order->id;
          
            $data = [
    'success_url' => $successURL,
    'line_items' => [
        [
            'price_data' => [
                "product_data" => [
                    "name" => "shping"
                ],
                'unit_amount' => $amount * 100,
                'currency' => 'USD'
            ],
            'quantity' => 2,
        ],
    ],
    'mode' => 'payment',
];

// Add email ONLY if logged in
if (auth()->check()) {
    $data['customer_email'] = auth()->user()->email;
}

$response = $stripe->checkout->sessions->create($data);

return redirect($response['url']);

    
}


    public function orderSuccess(Request $request)
    {

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

   $session = $stripe->checkout->sessions->retrieve($request->session_id);

    if ($session->status == 'complete') {
        
        $order = Order::find($request->order_id);
        $order->status = 1;
        $order->stripe_id = $session->id;
        $order->save();

        return redirect()-> route("welcome")->with("success","Payment already completed.");
    }else {

    $order = Order::find($request->order_id);
        $order->status = 2;
        $order->stripe_id = $session->id;
        $order->save();

        dd("Payment not completed.");


    } 
                    // Clear the cart
       
   
//    $stripe->checkout->sessions->retrieve(
//   'cs_test_a11YYufWQzNY63zpQ6QSNRQhkUpVph4WRmzW0zWJO2znZKdVujZ0N0S22u',
//   []
//);
    }
 }
