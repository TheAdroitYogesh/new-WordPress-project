<?php
/**
 * Template Name: USP Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title		= get_the_title();
	?>



<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
	<section class="inner-banner background-image"
		style="background-image:url(<?php echo get_bloginfo('template_url'); ?>/images/inner-background.jpg)">
		<div class="breadcrum-sec"><?php the_breadcrumb(); ?></div>
	</section>
	<section class="section why-choose-sec usp-sec">
		<div class="container">
			<div class="choose-column">
				<header class="title-head text-center mb-5">
					<h1 class="title-xl"><?php the_title(); ?></h1>
				</header>
				<div class="usp-rows">
					<?php 
					if( have_rows('opticsfit_usps') ): 
					while( have_rows('opticsfit_usps') ): the_row(); 
					$usp_title		= get_sub_field('usp_title');
					$usp_alignmnet		= get_sub_field('usp_alignmnet');
					$usp_block_id		= get_sub_field('usp_block_id');
					$usp_content		= get_sub_field('usp_content');
					$usp_image		= get_sub_field('usp_image');
					
				?>

					<div class="<?php echo $usp_alignmnet ;?> d-flex align-items-center mb-5" id="<?php echo $usp_block_id ;?>">
						<div class="col-md-6">
							<div class="usp-img">
								<img src="<?php echo $usp_image ;?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="usp-content">
								<h4><strong><?php echo $usp_title ;?></strong></h4>
								<div><?php echo $usp_content ;?></div>
							</div>
						</div>

					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</article>



<?php endwhile; ?>

<?php get_footer(); ?>