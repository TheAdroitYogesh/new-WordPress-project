<?php // Page Banner
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

<?php if( have_rows('banner_images') ): ?>
  <?php while( have_rows('banner_images') ): the_row(); 
   $image	= wp_get_attachment_image_src(get_sub_field('image'), 'xlarge');
  ?>
	<section class="inner-banner background-image" <?php if ($image) echo ' style="background-image:url(' . $image[0] . ')"'; ?>>
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
      <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo $banner_image;?>" alt=""></a>
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