<?php
/**
 * Template Name: Why Choose Us Page
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
			<div class="heading-column">
				<?php if( have_rows('heading_row') ): ?>
				<?php while( have_rows('heading_row') ): the_row(); 
        			$heading = get_sub_field('heading');
        			$content = get_sub_field('content');
					$heading_blocks = get_sub_field('heading_blocks');
        		?>
				<div class="row d-flex align-items-center">
					<div class="text-center mb-3">
						<h2 class="title-xl"><?php echo $heading;?></h2>
						<?php echo $content;?>
					</div>
					<?php if( have_rows('heading_blocks') ): ?>
					<?php while( have_rows('heading_blocks') ): the_row(); 
        				$block_icon = get_sub_field('block_icon');
        				$block_title = get_sub_field('block_title');
        			?>
					<div class="col-md-4">
						<div class="heading-blocks d-flex align-items-center p-lg-5 p-2 bg-light mb-4">
							<img src="<?php echo $block_icon;?>" />
							<span><?php echo $block_title;?></span>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="section bg-light lifestyle-sec" id="lifestyle">
		<div class="container">
			<?php if( have_rows('right_image_column1') ): ?>
			<?php while( have_rows('right_image_column1') ): the_row(); 
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
        	?>
			<div class="row d-flex align-items-center">
				<div class="col-md-6">
					<header class="csr-title-head">
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div><?php echo $section_content;?></div>
					</header>
				</div>
				<div class="col-md-6">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section two-col">
		<div class="container">
			<?php if( have_rows('two_column_row') ): ?>
			<?php while( have_rows('two_column_row') ): the_row(); 
        		$section_title = get_sub_field('section_title');
				$column_section = get_sub_field('column_section', false);
        	?>
			<div class="choose-column" id="revolutionary-worth">
				<?php if( get_sub_field('section_title') ): ?>
				<header class="title-head text-center">
					<h4 class="title-xl"><?php echo $section_title;?></h4>
				</header>
				<?php endif; ?>
				<div class="row">
					<?php
          				while ( have_rows( 'column_section' ) ): the_row();
						$column_image	= get_sub_field('column_image');
						$column_heading	= get_sub_field('column_heading');
          				$column_content	= get_sub_field('column_content');
        				?>
					<div class="col-md-6">
						<div class="column-sec bg-white">
							<img src="<?php echo $column_image;?>" alt="<?php echo $section_title;?>" />
							<div class="column-sec-blc">
								<h2><?php echo $column_heading;?></h2>
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

	<section class="section quality-sec text-white">
		<div class="container">
			<?php if( have_rows('left_image_content') ): ?>
			<?php while( have_rows('left_image_content') ): the_row(); 
				$section_heading = get_sub_field('section_heading');
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
        	?>
			<div class="row d-flex align-items-center">
				<div class="col-md-6 quality-img">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>
				<div class="col-md-6 quality-div">
					<header class="title-head quality-head">
						<small><span class="text-white"><?php echo $section_heading;?></span></small>
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div><?php echo $section_content;?></div>
					</header>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="section bg-light vision-sec" id="vision">
		<div class="container">
			<?php if( have_rows('right_image_column2') ): ?>
			<?php while( have_rows('right_image_column2') ): the_row(); 
        		$section_title = get_sub_field('section_title');
        		$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
        	?>
			<div class="row d-flex align-items-center">
				<div class="col-md-6">
					<header class="csr-title-head">
						<h2 class="title-xl"><?php echo $section_title;?></h2>
						<div class=""><?php echo $section_content;?></div>
					</header>
				</div>
				<div class="col-md-6">
					<img src="<?php echo $section_image;?>" alt="<?php echo $section_title;?>" />
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<?php if( have_rows('initiative_section') ): ?>
	<?php while( have_rows('initiative_section') ): the_row(); 
		$section_heading     = get_sub_field('section_heading');
		$section_title			= get_sub_field('section_title');
		$section_content		= get_sub_field('section_content');
		$products			      = get_sub_field('products', false);
	?>
	<section class="section initiative-section" id="glasses4free">
		<div class="container">
			<div class="trending-block">
				<?php if( get_sub_field('section_title') ): ?>
				<header class="title-head text-center">
					<?php if( get_sub_field('section_heading') ): ?><small><span><?php echo $section_heading;?></span></small><?php endif; ?>
					<h3 class="title-xl"><?php echo $section_title;?></h3>
					<?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
				</header>
				<?php endif; ?>
				<div class="everyone-glasses-row">
					<div class="container">
						<div class="everyone-column">
							<?php
          						while ( have_rows( 'products' ) ): the_row(); 
          						$product_image	= get_sub_field('product_image');        
        					?>
							<div class="card shine">
								<div class="sec-pic"><img src="<?php echo $product_image;?>" class="card-img-top"
										alt="<?php echo $section_heading;?>"></div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<section class="section text-center technology-section">
		<div class="container">
			<?php if( have_rows('single_column_img') ): ?>
			<?php while( have_rows('single_column_img') ): the_row(); 
        		$section_heading = get_sub_field('section_heading');
        		$section_title = get_sub_field('section_title');
				$section_content = get_sub_field('section_content');
				$section_image = get_sub_field('section_image');
        	?>
			<header class="csr-title-head title-head text-center">
				<small><span><?php echo $section_heading;?></span></small>
				<h2 class="title-xl"><?php echo $section_title;?></h2>
			</header>
			<div class="technology-block">
			<?php echo $section_content;?>	
			<img src="<?php echo $section_image;?>" class="card-img-top mt-4"
										alt="<?php echo $section_heading;?>"></div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>