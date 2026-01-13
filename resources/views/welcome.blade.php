@extends('layouts.master')

@section('content')


	<!-- product section -->


	<div class = "row">
			
	</div>
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">

				 

				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($categories as $item)
					
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/Products/{{ $item->id}}"><!--link to products page with category id-->
								<img src="{{ url($item -> ImagePath) }}" 
								style="max-height: 600px; min-height: 600px"
									alt=""></a>
						</div>
						<h3>{{$item -> name }}</h3>
						{{-- <p class="product-price"><span>{{ $item -> description }}</span> 2E </p> --}}
										</div>
				</div>
					
				@endforeach

				
				
			</div>
		</div>
	</div>

@endsection