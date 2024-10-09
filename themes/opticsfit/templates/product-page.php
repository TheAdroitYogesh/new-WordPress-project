<?php
/**
 * Template Name: Products Page
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

	<?php
			if( have_rows('page_banner') ): 
				get_template_part('partials/banners/internal/page_banner');
				$i	= 1;
			endif;			
	?>

	<section class="section popular-product category-grid-wrapper">
		<div class="container">

			<div class="row">
				<div class="col-sm-9">
					<ul class="category-ul d-flex p-0 mb-3">
						<li class="nav-item"><a class="nav-link" href="#">Eyeglasses</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Sunglasses</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Powered Sunglasses</a></li>
					</ul>
				</div>
				<div class="col-sm-3 showing-results">
					<span>Showing 09 of 115 Results</span>
				</div>
			</div>
			<div class="row p-3">
				<div class="col-sm-3 filter-sidebar">
					<div class="filter-category-wrapper px-3">
						<!-- <h4 class="mb-5">Filters By</h4> -->
						<div class="accordion category-dropdown" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link" type="button" data-toggle="collapse"
											data-target="#collapseOne" aria-expanded="true"
											aria-controls="collapseOne">Frame size yogesh
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox01">
											<label for="checkbox01">EXTRA NARROW(6)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox02">
											<label for="checkbox02">NARROW(24)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox03">
											<label for="checkbox03">MEDIUM(48)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox03">
											<label for="checkbox03">WIDE(48)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox03">
											<label for="checkbox03">EXTRA WIDE(48)</label>
										</div>

									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseTwo" aria-expanded="false"
											aria-controls="collapseTwo">
											FRAME COLOR
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox04">
											<label for="checkbox04">BLACK(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BLUE(11)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">GREY(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BROWN(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">TORTOISE(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">GREEN(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">TRANSPARENT(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">GUNMETAL(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">PINK(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">YELLOW(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">RED(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BROWN TRANSPARENT(25)</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BROWN TRANSPARENT(25)</label>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseThree" aria-expanded="false"
											aria-controls="collapseThree">
											BRAND
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox04">
											<label for="checkbox04">BRAND 1</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BRAND 2</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox05">
											<label for="checkbox05">BRAND 3</label>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseFour" aria-expanded="false"
											aria-controls="collapseFour">
											MATERIAL
										</button>
									</h5>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox12"> <label for="checkbox12">Black</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox13"> <label for="checkbox13">Brown</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox14"> <label for="checkbox14">White</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox15"> <label for="checkbox15">Brown</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox16"> <label for="checkbox16">Grey</label>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingFive">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseFive" aria-expanded="false"
											aria-controls="collapseFive">
											SHAPE
										</button>
									</h5>
								</div>
								<div id="collapseFive" class="collapse" aria-labelledby="headingFive"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox17"> <label for="checkbox17">SHAPE 1</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox18"> <label for="checkbox18">SHAPE 2</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox19"> <label for="checkbox19">SHAPE 3</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox20"> <label for="checkbox20">SHAPE 4</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox21"> <label for="checkbox21">SHAPE 5</label>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingSix">
									<h5 class="m-0 accordian-title">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseSix" aria-expanded="false"
											aria-controls="collapseSix">
											STYLE
										</button>
									</h5>
								</div>
								<div id="collapseSix" class="collapse" aria-labelledby="headingSix"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox22"> <label for="checkbox22">Gift for Him</label>
										</div>
										<div class="btn-checkbox mb-2">
											<input type="checkbox" aria-label="Checkbox for following text input"
												id="checkbox23"> <label for="checkbox23">Gift for Her</label>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="col-sm-9 all-products">
					<div class="row align-items-center">
						<div class="col-md-12 d-flex align-items-center background-secondary px-4 py-2">
							<span>Sort By:</span>
							<ul class="sort-ul d-md-flex">
								<li class="nav-item"><a class="nav-link" href="#">Relevance</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Popularity</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Price - Low to High</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Price - High to Low</a></li>
							</ul>

						</div>
					</div>
					<div class="row grid-5 px-2 py-4">
						<div class="col-md-6 col-lg-4 mb-4">
							<div class="product-card yogesh">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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

						<div class="col-md-6 col-lg-4 mb-4">
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
								<div class="product-detail cat-grid">
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



					</div>





				</div>
			</div>


		</div>
	</section>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>