@if(session('cart'))
                @php
                    // 1. Calculate the subtotal of all items in the cart
                    $subtotal = collect(session('cart'))->sum(function($item) {
                        return $item['price'] * $item['quantity'];
                    });
                    $shipping = 45; // Your fixed shipping cost
                @endphp

                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            
                            <tbody> <!-- Moved outside the loop -->
                                @foreach(session('cart') as $key => $item)
                                <tr class="table-body-row" data-id="{{ $key }}">
                                    <td class="product-remove"><a href="#"><i class="fa fa-trash" remove-from-cart></i></a></td>
                                    <td class="product-image text-center">
                                        <a href="single-product.html">
                                            <img src="{{ asset($item['photo']) }}" class="img-fluid rounded" style="max-width: 80px; height: auto; position: static;" alt="Product Image">
                                        </a>
                                    </td>
                                    <td class="product-name">{{ $item['name'] }}</td>
                                    <td class="product-price">${{ number_format($item['price'], 2) }}</td>
                                    <td>
										<input type="number" name="quantity"  class="quantity" class="form-control-quantity" value="{{ $item['quantity'] }}" min="1"> </td>
                                    <!-- This calculates the line total for this specific item -->
                                    <td class="product-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>${{ number_format($subtotal, 2) }}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>${{ number_format($shipping, 2) }}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>${{ number_format($subtotal + $shipping, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons mt-3">
                            <a href="/checkout" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12 text-center">
                    <p>Your cart is empty!</p>
                </div>
            @endif