@extends('layouts.master')

@section('content')

@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}</div>
@endif

<div class="row">
				@foreach ($products as $item)
					
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html">
								
								<img src="{{ url($item -> photo) }}" 
								style="max-height: 600px; min-height: 600px"
									alt=""></a>
						</div>
						<h3>{{$item -> name }}</h3>
						<p class="text"><span>{{ $item -> description }}</span></p>
						<p class="product-price"><span>{{ $item -> price }}$</span></p>
						<a href="{{ route('add.to.cart', $item->id) }}"
							 class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
					
				@endforeach

				
				
			</div>

@endsection