<?php

/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post();
	$page_title		= get_the_title();
	$i	= 1;
?>

	<?php
	if (have_rows('page_banner')) :
		while (have_rows('page_banner')) : the_row();

			get_template_part('partials/banners/home/page_banner');

		endwhile;
	endif;

	get_template_part('rows/page_rows');
	?>

<?php endwhile; ?>


<!-- OUR MISSION STARTS -->
<section class="section mission-sec missorg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<header class="title-head">
					<small><span>Our Mission</span></small>
					<h3 class="title-xl">Changes Lives Through Better Vision</h3>
				</header>
				<div class="mission-content">
					<p>At Opticsfit, our mission is simple yet powerful: to change lives through better vision. We believe that clear and comfortable vision is a basic human right and are committed to making it accessible to everyone.</p>
					<p>Our eyewear products are designed to go beyond just helping you see better. We understand that eyewear is also a means of self-expression and confidence. That's why we strive to create eyeglasses that only meet your vision needs but also complement your unique style and personality.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mission-img">
					<img src="https://opticsfitltdev.wpengine.com/wp-content/uploads/2023/01/men-pair-glasses.jpg" alt="" />
				</div>
			</div>
		</div>

	</div>
</section>
<!-- OUR MISSION ENDS -->

<!-- IDENTITY SEC STARTS -->
<section class="section dark-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="mission-img">
					<img src="https://opticsfitltdev.wpengine.com/wp-content/uploads/2023/01/men-pair-glasses.jpg" alt="" />
				</div>
			</div>
			<div class="col-lg-6">
				<header class="title-head">
					<small><span>Our Identity</span></small>
					<h3 class="title-xl">Vision for the bold and Adventurous</h3>
				</header>
				<div class="mission-content">
					<p>At Opticsfit, our mission is simple yet powerful: to change lives through better vision. We believe that clear and comfortable vision is a basic human right and are committed to making it accessible to everyone.</p>
					<p>Our eyewear products are designed to go beyond just helping you see better. We understand that eyewear is also a means of self-expression and confidence. That's why we strive to create eyeglasses that only meet your vision needs but also complement your unique style and personality.</p>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- IDENTITY SEC ENDS -->

<!-- TEAM SEC STARTS -->
<section class="section">
	<div class="container">
		<header class="title-head text-center">
			<small><span>Our Team</span></small>
			<h3 class="title-xl">Here's a little sneak peek at our team!</h3>
		</header>
		<div class="row mb-5">
			<div class="col-lg-6">
				<div class="card">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Haim (founder)</h5>
						<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque blanditiis, iste nemo nihil nam modi nulla quis maxime facere in maiores, sunt, excepturi quaerat reprehenderit rem consectetur ipsam. Aliquid?</p>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Pakshal (founder)</h5>
						<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque blanditiis, iste nemo nihil nam modi nulla quis maxime facere in maiores, sunt, excepturi quaerat reprehenderit rem consectetur ipsam. Aliquid?</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Guy (CEO)</h5>
						<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque blanditiis, iste nemo nihil nam modi nulla quis maxime facere in maiores, sunt, excepturi quaerat reprehenderit rem consectetur ipsam. Aliquid?</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Maria (Head Customer Experience)</h5>
						<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque blanditiis, iste nemo nihil nam modi nulla quis maxime facere in maiores, sunt, excepturi quaerat reprehenderit rem consectetur ipsam. Aliquid?</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Shreejit (Head Logistics)</h5>
						<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque blanditiis, iste nemo nihil nam modi nulla quis maxime facere in maiores, sunt, excepturi quaerat reprehenderit rem consectetur ipsam. Aliquid?</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- TEAM SEC ENDS -->

<!-- YELLOW BOX STARTS -->
<div class="yellow-box-wrapper">
	<div class="container">
		<div class="yellow-box">
			<div class="yellow-box-content">
				<p>Join us on our mission to make the world a better place through better vision. Let us be your trusted partner in your journey towards clear and comfortable vision, self-expression, and confidence. At Opticsfit, we're more than just an eyewear company - we're a movement towards a brighter future.</p>
			</div>
		</div>
	</div>
</div>
<!-- YELLOW BOX ENDS -->





<?php get_footer(); ?>