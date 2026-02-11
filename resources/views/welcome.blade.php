@extends('layouts.master')

@section('content')

	<!-- hero section -->
	<div class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="hero-text">
						<h1>Welcome to <span class="orange-text">Cinnabon</span></h1>
						<p>Indulge in the irresistible aroma and taste of our freshly baked cinnamon rolls and warm treats. Made with love, served with joy.</p>
						<div class="hero-btns">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero section -->

	<!-- features section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Why <span class="orange-text">Choose</span> Us</h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h3>Home Delivery</h3>
										<p>Sit voluptatem accusantium dolore mque laudantium totam rem aperiam.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-user-shield"></i>
									</div>
									<div class="content">
										<h3>Best Quality</h3>
										<p>Sit voluptatem accusantium dolore mque laudantium totam rem aperiam.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-seedling"></i>
									</div>
									<div class="content">
										<h3>Fresh Ingredients</h3>
										<p>Sit voluptatem accusantium dolore mque laudantium totam rem aperiam.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-crown"></i>
									</div>
									<div class="content">
										<h3>Custom Orders</h3>
										<p>Sit voluptatem accusantium dolore mque laudantium totam rem aperiam.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features section -->

	<!-- product section -->


	<div class = "row">

	</div>
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">

				 

				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Discover our wide range of freshly baked cinnamon rolls, pastries, and treats. Each product is made with love and the finest ingredients.</p>
					</div>
				</div>
			</div>

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
		</div>
	</div>

	<!-- testimonial section -->
	<div class="testimonial-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Sarah Johnson <span>Regular Customer</span></h3>
								<p class="testimonial-body">
									"The cinnamon rolls from Cinnabon are absolutely divine! The perfect balance of cinnamon and sweetness. I can't get enough!"
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Mike Chen <span>Food Blogger</span></h3>
								<p class="testimonial-body">
									"Cinnabon's commitment to quality is evident in every bite. Their fresh baking process makes all the difference."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Emily Davis <span>Family Mom</span></h3>
								<p class="testimonial-body">
									"My kids love the treats from Cinnabon! It's become our weekend tradition to enjoy their delicious baked goods."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonial section -->

	<!-- services section -->
	<div class="services-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Services</h3>
						<p>We offer a variety of services to make your experience delightful, from catering to custom baking.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-service-item">
						<div class="service-icon">
							<i class="fas fa-utensils"></i>
						</div>
						<h4>Catering Services</h4>
						<p>Perfect for events, parties, and gatherings. We provide fresh baked goods tailored to your needs.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-service-item">
						<div class="service-icon">
							<i class="fas fa-shopping-cart"></i>
						</div>
						<h4>Online Ordering</h4>
						<p>Order online for pickup or delivery. Convenient and easy, with fast service.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-service-item">
						<div class="service-icon">
							<i class="fas fa-birthday-cake"></i>
						</div>
						<h4>Custom Cakes</h4>
						<p>Design your own cake for special occasions. Made with love and the finest ingredients.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end services section -->

@endsection
