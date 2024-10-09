<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav class="navbar navbar-expand-md navbar-light">
    <?php
    wp_nav_menu(
      array(
        'theme_location'  => 'primary',
        'menu_class'      => 'navbar-nav',
        'container_id'    => 'navbar',
        'container_class' => 'collapse navbar-collapse',
        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
        'fallback_cb'     => false,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
      )
    );
    ?>
    <!-- <div class="collapse navbar-collapse justify-content-center" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Men Glasses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Women Glasses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kids Glasses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Deals</a></li>
      </ul>
    </div> -->
    
    
        <?php global $current_user; wp_get_current_user();
                 $date = 'guest';
    ?>

    <div class="user-section">

      <ul class="navbar-nav">


       <li class="nav-item dropdown">
        <?php if(is_user_logged_in()) {?>

        <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo get_bloginfo('template_url'); ?>/images/user.png" alt="">
            <?php  $current_user = wp_get_current_user(); 
            echo $current_user->display_name;?>
        </a>
        
          <ul class="dropdown-menu" aria-labelledby="user">
            <li><a class="dropdown-item" href="<?= site_url(); ?>/my-account/">My Account</a></li>
            <li><a class="dropdown-item" href="<?= site_url();?>/my-account/orders/">Orders</a></li>
            <li><a class="dropdown-item" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a></li>
          </ul>
        
              
      <?php } else {  ?>
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?= site_url(); ?>/login/">
         Login
          </a>
          <!--<ul class="dropdown-menu" aria-labelledby="user">
            <li><a class="dropdown-item" href="#">test1</a></li>
            <li><a class="dropdown-item" href="#">test2</a></li>
            <li><a class="dropdown-item" href="#">test3</a></li>
          </ul>-->
          </li>
      <?php  } ?>

     <!-- <ul class="dropdown-menu" aria-labelledby="user">
            <li><a class="dropdown-item" href="#">test1</a></li>
            <li><a class="dropdown-item" href="#">test2</a></li>
            <li><a class="dropdown-item" href="#">test3</a></li>
          </ul>-->
        </li>

      </ul>


    </div>
    
    
<!--    <div class="user-section">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo get_bloginfo('template_url'); ?>/images/user.png" alt=""></a>
          <ul class="dropdown-menu" aria-labelledby="user">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>-->
  </nav><!-- #site-navigation -->
<?php endif; ?>