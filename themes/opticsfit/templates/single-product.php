<?php
/**
 * Template Name: Single Product Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title			= get_the_title();
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>



	<section class="section popular-product category-grid-wrapper mt-5">
		<div class="container breadcrumb-wrapper mt-5">
			<div class="row">
				<div class="col-sm-9">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
                       
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item">Men’s Glasses</li>
							<li class="breadcrumb-item" aria-current="page">Eyeglasses</li>
							<li class="breadcrumb-item active" aria-current="page">Zue-Z6943 Noir for Men (Black)</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-3 offer">At just ₹569/- (50% off)</div>
			</div>
		</div>
	</section>

	<!-- [SINGLE PRODUCT] -->
	<section class="section single-product-wrapper pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex pt-5">
					<div class="col-sm-3 col-lg-2 thumbnail-image">
						<div class="prod-slider slider-nav">
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/product1.png"></div>
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/single-img1.png"></div>
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/product1.png"></div>
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/single-img1.png"></div>
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/product1.png"></div>
							<div><img src="<?php bloginfo('template_url'); ?>/images/products/single-img1.png"></div>

						</div>
					</div>
					<div class="col-sm-9 col-lg-10">
						<div class="prod-slider-col">
							<div class="prod-slider slider-for">
								<div><img src="<?php bloginfo('template_url'); ?>/images/products/product1.png""></div>
							<div><img src=" <?php bloginfo('template_url'); ?>/images/products/single-img1.png"> </div> <div><img
										src="<?php bloginfo('template_url'); ?>/images/products/product1.png"></div>
								<div><img src="<?php bloginfo('template_url'); ?>/images/products/single-img1.png">
								</div>
								<div><img src="<?php bloginfo('template_url'); ?>/images/products/product1.png"></div>
								<div><img src="<?php bloginfo('template_url'); ?>/images/products/single-img1.png">
								</div>
							</div>
							<div class="single-wishlist-icon icon">
								<i class="fa fa-heart"></i>
							</div>
							<div class="try-on">
								<span>Virtual Try On</span>
							</div>
						</div>

					</div>

				</div>
				<div class="col-md-6">
					<div class="product-heading justify-content-between">
						<div class="title-tag mb-2">
							<span>SMALL GLASSES</span>
						</div>
						<h3 class="desc-title mb-0">Zue-Z6943 Noir for Men (Black)</h3>
						<span class="product-code">ZG011AQA</span>
					</div>

					<div class="product-detail">
						<div class="price-quote my-2 d-flex align-items-center">
							<span class="final-price">₹569</span>
							<span class="mx-3 cut-price"><s>₹1999</s></span>
							<span class="off-offer">50% off</span>
						</div>
					</div>

					<div class="ratings align-items-center d-md-flex mb-3">
						<div class="ratings d-flex">
							<span class="star-ratings">4.8 <i class="fa fa-star"></i></span>
							<span class="prod-reviews">1428 Ratings and 146 Reviews</span>
						</div>


						<div class="wishlist-icon grid-wish-icon icon">
							<i class="wishlist-i grid-whish"></i>
						</div>
					</div>
					<p class="desc my-3">High quality and stylish computer glasses to protect your eyes from Blue Light
						of
						digital devices. It will provide you with better sleep and a healthier life. High quality
						and stylish computer glasses to protect your eyes from Blue Light of digital devices.
						It will provide you with better sleep and a healthier life.
					</p>

					<div class="color-row mb-3">

						<div class="color-wrapper d-flex">
							<ul class="d-flex">
								<li class="gold"><a href="">gold</a></li>
								<li class="grey"><a href="">grey</a></li>
								<li class="blue"><a href="">blue</a></li>
								<li class="black"><a href="">black</a></li>
							</ul>
						</div>
					</div>

					<div class="socials mt-4">
						<span class="attribute-title">Share Now: </span>
						<i class="fa fa-twitter"></i>
						<i class="fa fa-facebook"></i>
						<i class="fa fa-instagram"></i>
					</div>

					<div class="cart-buttons">
						<button class="btn cart">Add to Cart</button>
						<p>Know Your Size?</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- [/SINGLE PRODUCT] -->
	<section class="section single-product-wrapper pt-0">
		<div class="container">
			<div class="row attributes-wrapper mt-3">
				<div class="col-md-6 offers-block">
					<div class="offers py-4 px-5 text-center">
						<p>Get More For Less</p>
						<p>Get <strong>2 Pairs</strong> of Glasses and get a <strong>10% Off</strong></p>
						<p>Get <strong>3 Pairs</strong> of Glasses and get a <strong>15% Off</strong></p>
					</div>
				</div>
				<div class="col-md-6 attributes">
					<table class="attributes-wrapper" width="100%">
						<tr>
							<td><span>Product ID </span>: ZG011AQA</td>
							<td><span>Frame Size</span> : Medium</td>
						</tr>
						<tr>
							<td><span>Fit</span> : Unisex</td>
							<td><span>Frame Material</span> : TR - 90</td>
						</tr>
						<tr>
							<td><span>Key Dimensions</span> : 52-18-134</td>
							<td><span>Brand</span> : Black Noir</td>
						</tr>
					</table>
				</div>
			</div>
	</section>

	<section id="icon-set" class="section four-column-sec p-0">
		<div class="container">
			<div class="choose-column-product">
				<div class="row">
					<div class="col-6 col-md-3">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/free-shipping.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Free Shipping</p>
								<p class="ico-subhead">On Orders over ₹500</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/quick-payment.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Quick Payments</p>
								<p class="ico-subhead">100% Secure</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/big-deals.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Big Deals</p>
								<p class="ico-subhead">Over 40% Cashback</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/support.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">24/7 Support</p>
								<p class="ico-subhead">Over 40% Cashback</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="icon-set" class="section">
		<div class="container">
			<div class="row">
				<header class="title-head text-center">
					<h3 class="title-lg white-text">The Eyeglasses You Were Looking For</h3>
				</header>
			</div>

			<div class="responsive-tabs">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"><a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
							role="tab">Features</a></li>
					<li class="nav-item"><a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab"
							role="tab">Sizing</a></li>
					<li class="nav-item"><a id="tab-C" href="#pane-C" class="nav-link" data-bs-toggle="tab"
							role="tab">Care Instrutions</a></li>
				</ul>

				<div id="content" class="tab-content" role="tablist">
					<div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
						<div class="card-header" role="tab" id="heading-A">
							<h5 class="mb-0">
								<a data-bs-toggle="collapse" href="#collapse-A" aria-expanded="true"
									aria-controls="collapse-A">Collapsible Group Item A</a>
							</h5>
						</div>
						<div id="collapse-A" class="collapse show" data-bs-parent="#content" role="tabpanel"
							aria-labelledby="heading-A">
							<div class="card-body">
								<ul>
									<li>High Quality organic CR-39 lenses that block 100% of the Blue Light under 410nm
										and 45% of the Blue Light on the 410nm - 450nm spectrum.
									</li>
									<li>Super light TR-90 frames for excellent comfort</li>
									<li>Flexible hinges & temples that will adapt to any face shape</li>
									<li>Rubberized texture for a better grip on your nose and ears</li>
								</ul>
							</div>
						</div>
					</div>

					<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
						<div class="card-header" role="tab" id="heading-B">
							<h5 class="mb-0">
								<a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
									aria-controls="collapse-B">Collapsible Group Item B</a>
							</h5>
						</div>
						<div id="collapse-B" class="collapse" data-bs-parent="#content" role="tabpanel"
							aria-labelledby="heading-B">
							<div class="card-body">
								<ul>
									<li>High Quality organic CR-39 lenses that block 100% of the Blue Light under 410nm
										and 45% of the Blue Light on the 410nm - 450nm spectrum.
									</li>
									<li>Super light TR-90 frames for excellent comfort</li>
									<li>Flexible hinges & temples that will adapt to any face shape</li>
									<li>Rubberized texture for a better grip on your nose and ears</li>
								</ul>
							</div>
						</div>
					</div>

					<div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
						<div class="card-header" role="tab" id="heading-C">
							<h5 class="mb-0">
								<a data-bs-toggle="collapse" href="#collapse-C" aria-expanded="true"
									aria-controls="collapse-C">Collapsible Group Item C</a>
							</h5>
						</div>
						<div id="collapse-C" class="collapse" data-bs-parent="#content" role="tabpanel"
							aria-labelledby="heading-C">
							<div class="card-body">
								<ul>
									<li>High Quality organic CR-39 lenses that block 100% of the Blue Light under 410nm
										and 45% of the Blue Light on the 410nm - 450nm spectrum.
									</li>
									<li>Super light TR-90 frames for excellent comfort</li>
									<li>Flexible hinges & temples that will adapt to any face shape</li>
									<li>Rubberized texture for a better grip on your nose and ears</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="icon-set" class="section p-0">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="title-head text-center">
						<h3 class="title-lg white-text">You Might Also Like</h3>
					</header>
				</div>
				<div class="col-md-3">
					<div class="product-card">
						<div class="product-img mb-4">
							<img src="<?php bloginfo('template_url'); ?>/images/products/product1.png" alt="">
							<div class="wishlist-icon icon mb-4">
								<i class="fa fa-heart-o"></i>
							</div>
							<div class="color-icon">
								<ul class="d-flex">
									<li class="gold"><a href="">gold</a></li>
									<li class="grey"><a href="">grey</a></li>
									<li class="blue"><a href="">blue</a></li>
									<li class="black"><a href="">black</a></li>
								</ul>
							</div>
						</div>
						<div class="cat-grid">
							<div class="img-tag">
								<span class="glass-type">SMALL GLASSES</span>
							</div>
							<div class="product-title my-2">Zue-Z6943 Black</div>
							<div class="price-quote">
								<span class="final-price">₹569</span>
								<span class="cut-price px-3"><s>₹1999</s></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="product-card">
						<div class="product-img mb-4">
							<img src="<?php bloginfo('template_url'); ?>/images/products/product1.png" alt="">
							<div class="wishlist-icon icon mb-4">
								<i class="fa fa-heart-o"></i>
							</div>
							<div class="color-icon">
								<ul class="d-flex">
									<li class="gold"><a href="">gold</a></li>
									<li class="grey"><a href="">grey</a></li>
									<li class="blue"><a href="">blue</a></li>
									<li class="black"><a href="">black</a></li>
								</ul>
							</div>
						</div>
						<div class="cat-grid">
							<div class="img-tag">
								<span class="glass-type">SMALL GLASSES</span>
							</div>
							<div class="product-title my-2">Zue-Z6943 Black</div>
							<div class="price-quote">
								<span class="final-price">₹569</span>
								<span class="cut-price px-3"><s>₹1999</s></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="product-card">
						<div class="product-img mb-4">
							<img src="<?php bloginfo('template_url'); ?>/images/products/product1.png" alt="">
							<div class="wishlist-icon icon mb-4">
								<i class="fa fa-heart-o"></i>
							</div>
							<div class="color-icon">
								<ul class="d-flex">
									<li class="gold"><a href="">gold</a></li>
									<li class="grey"><a href="">grey</a></li>
									<li class="blue"><a href="">blue</a></li>
									<li class="black"><a href="">black</a></li>
								</ul>
							</div>
						</div>
						<div class="cat-grid">
							<div class="img-tag">
								<span class="glass-type">METAL GLASSES</span>
							</div>
							<div class="product-title my-2">Alpha-A1202 Black</div>
							<div class="price-quote">
								<span class="final-price">₹569</span>
								<span class="cut-price px-3"><s>₹1999</s></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="product-card">
						<div class="product-img mb-4">
							<img src="<?php bloginfo('template_url'); ?>/images/products/product1.png" alt="">
							<div class="wishlist-icon icon mb-4">
								<i class="fa fa-heart-o"></i>
							</div>
							<div class="color-icon">
								<ul class="d-flex">
									<li class="gold"><a href="">gold</a></li>
									<li class="grey"><a href="">grey</a></li>
									<li class="blue"><a href="">blue</a></li>
									<li class="black"><a href="">black</a></li>
								</ul>
							</div>
						</div>
						<div class="cat-grid">
							<div class="img-tag">
								<span class="glass-type">SMALL GLASSES</span>
							</div>
							<div class="product-title my-2">Ring-C8592 Golden</div>
							<div class="price-quote">
								<span class="final-price">₹569</span>
								<span class="cut-price px-3"><s>₹1999</s></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="icon-set" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="title-head text-center mb-0">
						<h3 class="title-lg white-text">Customer Reviews</h3>
					</header>
					<div class="d-flex align-items-center justify-content-center mb-5">
						<div class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
								class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></div>								
						<div class="review-based">Based on 746 Reviews</div>
					</div>
				</div>
				<p>746 Reviews</p>
				<div class="col-md-6">
					<div class="review-card">						
						
					</div>
				</div>

				<div class="col-md-6">
					<div class="review-card">
																	
					</div>
				</div>
			</div>
		</div>
	</section>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>