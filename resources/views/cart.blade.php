@extends('layouts.master')

@section('content')


	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
    <div class="container">
        <form action="{{ route('order.post') }}" method="POST">
            @csrf

            
        <div class="row" id="cartProducts">
            
            @include('cartProducts')
        </form>
        </div>
    </div>
</div>						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="{{url('/Products')}}" class="boxed-btn black">Continue shopping</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->


@endsection 

@section('scripts')
 <script type="text/javascript">
    $("body").on("change", ".quantity", function(e) {
        var elem = $(this);
        var quantity = elem.val();
        var row = elem.closest("tr");
        var productId = row.attr("data-id");
        var price = parseFloat(row.find(".product-price").text().replace('$', ''));
        var newTotal = price * quantity;
        row.find(".product-total").text('$' + newTotal.toFixed(2));

        // Recalculate subtotal
        var subtotal = 0;
        $(".table-body-row").each(function() {
            var rowPrice = parseFloat($(this).find(".product-price").text().replace('$', ''));
            var rowQty = parseInt($(this).find(".quantity").val());
            subtotal += rowPrice * rowQty;
        });
        var shipping = 45; // Fixed shipping
        var total = subtotal + shipping;

        // Update the totals in the DOM
        $(".total-table tbody tr").eq(0).find("td").eq(1).text('$' + subtotal.toFixed(2)); // Subtotal
        $(".total-table tbody tr").eq(2).find("td").eq(1).text('$' + total.toFixed(2)); // Total

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                quantity: quantity
            },
            // success: function (response) {
            //    $("#cartProducts").html(response.success);
            //    console.log(response);
            // },
            error: function(xhr, status, error) {
                console.error("Error updating cart:", error);
            }
        });
    });
 </script>
@endsection
