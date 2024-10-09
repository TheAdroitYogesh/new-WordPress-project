<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

$privacy_policy_page	= get_field('privacy_policy_page', 'option');
$privacy_policy_link	= $privacy_policy_page ? '<a href="' . get_the_permalink($privacy_policy_page) . '">' . get_the_title($privacy_policy_page) . '</a>' : '';

$terms_conditions_page	= get_field('terms_conditions_page', 'option');
$terms_conditions_link	= $terms_conditions_page ? '<a href="' . get_the_permalink($terms_conditions_page) . '">' . get_the_title($terms_conditions_page) . '</a>' : '';

$email_address	= get_field('email_address', 'option');
$phone_number		= get_field('phone_number', 'option');
$address				= get_field('address', 'option');

$facebook_url		= get_field('facebook_url', 'option');
$instagram_url	= get_field('instagram_url', 'option');
$whatsapp_url		= get_field('whatsapp_url', 'option');

$footer_logo			= get_field('footer_logo', 'option');

?>
</main>

<section class="section newsletter-sec">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h5 class="title-xl">Subscribe To Our Newsletter For Updates!</h5>
      </div>
      <div class="col-md-6">
        <div class="tnp tnp-subscription">
          <form method="post" action="<?php echo get_site_url(); ?>/?na=s">
            <input type="hidden" name="nr" value="page">
            <input type="hidden" name="nlang" value="">
            <div class="tnp-field tnp-field-email">
              <label for="tnp-1">Email</label>
              <input class="tnp-email" type="email" name="ne" placeholder="Enter your e-mail" id="tnp-1" value="" required="">
            </div>
            <div class="tnp-field tnp-field-button">
              <input class="tnp-submit" type="submit" value="Subscribe">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<p style="position: fixed;bottom: 26px;right: 40px;color: white;border-radius: 5px;z-index: 999;width: 223px;" class="zendesk_custom">
<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/02/MicrosoftTeams-image-30.png" /></p>
<footer id="footer" class="section footer pb-0">
	<div class="container">
		<div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="footer-widget">
          <div class="footer-logo"><img src="<?php echo $footer_logo; ?>" alt="Logo"></div>
          <div class="footer-loaction">
            <address>
              <?php				
							echo ($address['line_2'] ? $address['line_1'] . '<br>' . $address['line_1'] :
							($address['line_2'] && $address['line_3'])) ? $address['line_1'] . '<br>' . $address['line_2'] . '<br>' . $address['line_3'] : $address['line_1'];		?>
            </address>
            <?php if ($phone_number) : ?>
            <div class="tel"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></div>
            <?php endif; ?>
            <?php if ($email_address) : ?>
            <div class="email"><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <?php
          if(is_active_sidebar('footer-widget-1')){
          dynamic_sidebar('footer-widget-1'); } 
        ?>
      </div>
      <div class="col-lg-3 col-md-6">
        <?php
          if(is_active_sidebar('footer-widget-2')){
          dynamic_sidebar('footer-widget-2'); } 
        ?>
      </div>
      <div class="col-lg-3 col-md-6">
        <?php
          if(is_active_sidebar('footer-widget-3')){
          dynamic_sidebar('footer-widget-3'); } 
        ?>
      </div>
    </div>
    <div class="row mt-5 mb-4">
		<div class="col-md-6">
			<div class="footer-bottom-links">
			  <ul>
				<li><?php echo $terms_conditions_link ; ?></li>
				<li><?php echo $privacy_policy_link ; ?></li>
			  </ul>
			</div>
		</div>
		<div class="col-md-6">

			<?php if ($facebook_url || $instagram_url || $whatsapp_url) : ?>
				<div class="social-links">
				  <ul>					
						<?php if ($facebook_url) : ?>
					<li><a href="<?php echo $facebook_url; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/Facebook-logo.png" alt="facebook" /></a></li>
					<?php endif; ?>
						<?php if ($instagram_url) : ?>
					<li><a href="<?php echo $instagram_url; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/instagram-logo.png" alt="instagram" /></a></li>
					<?php endif; ?>
          <?php if ($whatsapp_url) : ?>
					<li><a href="<?php echo $whatsapp_url; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/whatsapp-logo.png" alt="whatsapp" /></a></li>
					<?php endif; ?>
				  </ul>
				</div>
				<?php endif; ?>
		</div>
	</div>
    
    <div class="copyright text-center pb-5">
      <?php printf( __( '&copy;%1$s %2$s. All rights reserved.' ), date('Y'), get_bloginfo( 'name' )); ?>
    </div>
	</div>
</footer>

<!--[VideoModal]-->
<div class="modal fade video-modal" id="VideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<button type="button" class="close video-modal-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      <div class="modal-body">        
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"></iframe>
        </div>
         
      </div>
    </div>
  </div>
</div>
<!--[/VideoModal]-->

<?php wp_footer(); ?>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" >
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;600;700&family=Work+Sans:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/334a6f7d92.js" crossorigin="anonymous"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/slick.min.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/swiper-bundle.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqy6C-0a6tL5WEtmOR8cO-XmaMtuEcQPw"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/main.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/bootstrap.bundle.min.js"></script>
<script src="//m.virtooal.com/JxU0Goam9A3sypbg" async></script>
<script>

</script>
</body>
</html>