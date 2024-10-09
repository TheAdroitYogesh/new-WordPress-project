<?php
/**
 * Template Name: CSR Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

<?php 
global $page_title;

while( have_rows('page_banner') ): the_row();
$banner_heading	= get_sub_field('banner_heading');
$banner_images	= get_sub_field('banner_images');
$banner_image	= get_sub_field('banner_image');
$banner_link	= get_sub_field('banner_link');
$banner_footer_heading	= get_sub_field('banner_footer_heading');
if ($banner_link) :
  $link_url		        = $banner_link['url'];
  $link_title		      = $banner_link['title'];
  $link_target	      = $banner_link['target'] ? $banner_link['target'] : '_self';
endif;
?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title		= get_the_title();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
	<?php if( have_rows('banner_images') ): ?>
	<?php while( have_rows('banner_images') ): the_row(); 
   		$image	= wp_get_attachment_image_src(get_sub_field('image'), 'xlarge');
  	?>

	<section class="csr-inner-banner inner-banner background-image"
		<?php if ($image) echo ' style="background-image:url(' . $image[0] . ')"'; ?>>
		<div class="breadcrum-sec"><?php the_breadcrumb(); ?></div>
		<?php if ($banner_heading) echo '<div class="banner-heading">' . ($banner_heading) . '</div>'; ?>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php if( get_sub_field('banner_image') ): ?>
	<section class="inner-banner-second <?php if(get_the_ID()=='556'){ echo 'virtual_try_on_open';}?>">
		<div class="container">
			<?php if ( get_sub_field( 'banner_link' ) ): ?>
			<div class="banner-img">
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img
						src="<?php echo $banner_image;?>" alt=""></a>
			</div>
			<?php else: // field_name returned false ?>
			<div class="banner-img">
				<img src="<?php echo $banner_image;?>" alt="">
			</div>
			<?php endif; // end of if field_name logic ?>

			<?php if ( get_sub_field( 'banner_footer_heading' ) ): ?>
			<div class="title-foot text-center pb-3">
				<?php echo $banner_footer_heading;?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>
	<?php endwhile; ?>

	<section class="section why-choose-sec">
		<div class="container">
			<div class="csr-column">
				<?php if( have_rows('heading_row') ): ?>
				<?php while( have_rows('heading_row') ): the_row(); 
        			$heading = get_sub_field('heading');
        			$content = get_sub_field('content');
					$image = get_sub_field('image');
        		?>
				<div class="row d-flex align-items-center">
					<div class="col-md-8">
						<h2 class="title-xl"><?php echo $heading;?></h2>
						<div class="con"><?php echo $content;?>
						</div>

					</div>
					<div class="col-md-4">
						<img src="<?php echo $image;?>" alt="<?php echo $heading;?>" />
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="section text-center">
		<div class="container">
			<?php if( have_rows('single_column_row') ): ?>
			<?php while( have_rows('single_column_row') ): the_row(); 
        		$section_heading = get_sub_field('section_heading');
        		$section_title = get_sub_field('section_title');
				$section_content = get_sub_field('section_content');
        	?>
			<header class="csr-title-head title-head text-center">
				<small><span><?php echo $section_heading;?></span></small>
				<h2 class="title-xl"><?php echo $section_title;?></h2>
				<div><?php echo $section_content;?></div>
			</header>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<?php if( have_rows('right_image_column') ): ?>
			<?php while( have_rows('right_image_column') ): the_row(); 
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
        	?>
			<div class="row">
				<div class="col-md-7 left-con">
					<header class="csr-title-head">
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div><?php echo $section_content;?></div>
					</header>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>

			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section vision-care">
		<div class="container">
			<?php if( have_rows('two_column_row') ): ?>
			<?php while( have_rows('two_column_row') ): the_row(); 
        		$section_title = get_sub_field('section_title');
				$column_section = get_sub_field('column_section', false);
        	?>
			<div class="choose-column">
				<?php if( get_sub_field('section_title') ): ?>
				<header class="title-head text-center">
					<h4 class="title-xl"><?php echo $section_title;?></h4>
				</header>
				<?php endif; ?>
				<div class="row">
					<?php
          				while ( have_rows( 'column_section' ) ): the_row();
						$column_heading	= get_sub_field('column_heading');
          				$column_content	= get_sub_field('column_content');
        				?>
					<div class="col-md-6">
						<div class="column-sec">
							<h2><?php echo $column_heading;?></h2>
							<?php echo $column_content;?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section vision-pgm">
		<div class="container">
			<?php if( have_rows('three_column_row') ): ?>
			<?php while( have_rows('three_column_row') ): the_row(); 
			    $section_heading = get_sub_field('section_heading');
        		$section_title = get_sub_field('section_title');
				$column_section = get_sub_field('column_section', false);
        	?>
			<div class="choose-column">
				<header class="title-head text-center">
					<small><span><?php echo $section_heading;?></span></small>
					<h4 class="title-xl"><?php echo $section_title;?></h4>
				</header>
				<div class="row">
					<?php
          				while ( have_rows( 'column_section' ) ): the_row();
						$column_image	= get_sub_field('column_image');
						$column_heading	= get_sub_field('column_heading');
          				$column_content	= get_sub_field('column_content');
        				?>
					<div class="col-md-4">
						<div class="column-sec visionpgm-sec">
							<div class="visionpgm-img">
								<img src="<?php echo $column_image;?>" alt="<?php echo $column_heading;?>" />
							</div>
							<div class="visionpgm-con">
								<h3><?php echo $column_heading;?></h3>
								<?php echo $column_content;?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section preventing-blindness text-white">
		<div class="container">
			<?php if( have_rows('left_image_with_content') ): ?>
			<?php while( have_rows('left_image_with_content') ): the_row(); 
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
				$sub_title = get_sub_field('sub_title');
				$section_sub_content = get_sub_field('section_sub_content');
        	?>
			<div class="row d-flex align-items-center">
				<div class="col-md-6 preventing-img">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>
				<div class="col-md-6">
					<header class="preventing-title-head">
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div><?php echo $section_content;?></div>
					</header>
				</div>
				<div class="preventing-sub-con mt-5">
					<h2 class="title-xl"><?php echo $sub_title;?></h2>
					<div><?php echo $section_sub_content;?></div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section building-awareness">
		<div class="container">
			<?php if( have_rows('right_image_with_content') ): ?>
			<?php while( have_rows('right_image_with_content') ): the_row(); 
				$section_heading = get_sub_field('section_heading');
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
				$sub_title = get_sub_field('sub_title');
				$section_sub_content = get_sub_field('section_sub_content');
        	?>
			<div class="row d-flex align-items-center">
				<div class="col-md-6">
					<header class="title-head awareness-title-head">
						<small><span><?php echo $section_heading;?></span></small>
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div><?php echo $section_content;?></div>
					</header>
				</div>
				<div class="col-md-6 awareness-img">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>
				<div class="preventing-sub-con">
					<h2 class="title-xl"><?php echo $sub_title;?></h2>
					<div><?php echo $section_sub_content;?></div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section recommend-sec">
		<div class="container p-5 bg-black text-white">
			<div class="row d-flex justify-content-center">
				<div class="col-md-11">
					<?php if( have_rows('recommendation_form') ): ?>
					<?php while( have_rows('recommendation_form') ): the_row(); 
						$section_title = get_sub_field('section_title');
        				$form_shortcode = get_sub_field('form_shortcode');
        			?>
					<header>
						<h2 class="title-xl text-white text-center"><?php echo $section_title;?></h2>
					</header>
					<div class="recom-form mt-4 contact-sec">
						<?php echo do_shortcode(get_sub_field('form_shortcode')); ?>
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