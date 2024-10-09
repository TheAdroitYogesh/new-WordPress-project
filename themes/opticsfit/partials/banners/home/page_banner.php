<?php // Page Banner 
if( have_rows('banners') ): ?>
<section class="home-slider">
	<div class="slider-banners owl-carousel">
		<?php while( have_rows('banners') ): the_row(); 
		$banner_title		= get_sub_field('banner_title');
		//$banner_content		= get_sub_field('banner_content');
		$button_link		= get_sub_field('button_link');
		$background_image	= wp_get_attachment_image_src(get_sub_field('background_image'), 'xlarge');
		?>
		<div class="item">
			<?php if ( get_sub_field( 'button_link' ) ):?>
			<a href="<?php echo $button_link;?>">
				<img src="<?php if ($background_image) echo '' . $background_image[0] . ''; ?>" alt="<?php echo $banner_title;?>"
					class="banner-img">
			</a>
			<?php else: ?>

			<img src="<?php if ($background_image) echo '' . $background_image[0] . ''; ?>" alt="<?php echo $banner_title;?>" class="banner-img">

			<?php endif; ?>

			<?php /*?><div class="banner-content text-center">
				<?php
				if ($banner_title) echo do_shortcode('<h1 class="title-xl">' . $banner_title . '</h1>');
                            
              	if ($banner_content) echo '<p>' .$banner_content. '</p>';

				if( have_rows('banner_buttons') ): ?>
				<?php
					while ( have_rows( 'banner_buttons' ) ): the_row();
					$button			= get_sub_field('button');
					$link_url		= $button['url'];
					$link_title		= $button['title'];
					$link_target	= $button['target'] ? $button['target'] : '_self';
				?>
				<div class="cta">
					<a class="btn btn-primary text-uppercase" href="<?php echo esc_url( $link_url ); ?>"
						target="<?php echo esc_attr( $link_target ); ?>">Learn
						More<?php echo esc_html( $link_title ); ?></a>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div><?php */?>
		</div>
		<?php endwhile; ?>
	</div>
</section>
<?php
endif;
?>