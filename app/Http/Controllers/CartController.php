<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



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

        dd("hi");
    }

 }
