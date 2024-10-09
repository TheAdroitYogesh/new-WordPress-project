<?php // Team Row
global $i, $page_title, $background_colour;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section our-team"
  data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?> 

      <div class="row mb-md-5 featured-team">
        <?php
          $args = array(
          'post_type'			=> 'team',
          'post_status'		=> 'publish',
          'orderby'			=> 'date',
          'order' 			=> 'desc',
          'posts_per_page'	=> 2,
          'meta_query'=> array(
            array(
                  'key'     => 'featured_member',
                  'value'   => 'yes',
                  'compare' => 'LIKE',
                ),
          ),
          );
          $team_query = new WP_Query( $args );
          if ($team_query->have_posts()):
              $count = $team_query->found_posts; 
          while ($team_query->have_posts() ): $team_query->the_post();
          $post_title				  = get_the_title();
          $member_image		    = get_field('member_image'); 
          $member_position    = get_field('member_position'); 
          $member_content     = get_field('member_content'); 
        ?>
        <div class="col-lg-6">
          <div class="card">
            <img class="card-img-top" src="<?php echo $member_image; ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?php echo $post_title; ?> <?php if( get_field('member_position') ): ?>(<?php echo $member_position; ?>)<?php endif; ?></h4>
              <div class="card-text"><?php echo $member_content; ?></div>
            </div>
          </div>
        </div>
        <?php endwhile;?>
        <?php	endif; wp_reset_query(); ?>

      </div>


      <div class="row all-team">
        <?php
          $args = array(
          'post_type'			=> 'team',
          'post_status'		=> 'publish',
          'orderby'			=> 'date',
          'order' 			=> 'desc',
          'posts_per_page'	=> -1,
          'meta_query'=> array(
            array(
                  'key'     => 'featured_member',
                  'value'   => 'no',
                  'compare' => 'LIKE',
                ),
          ),
          );
          $team_query = new WP_Query( $args );
          if ($team_query->have_posts()):
              $count = $team_query->found_posts; 
          while ($team_query->have_posts() ): $team_query->the_post();
          $post_title				  = get_the_title();
          $member_image		    = get_field('member_image'); 
          $member_position    = get_field('member_position'); 
          $member_content     = get_field('member_content'); 
        ?>

        <div class="col-lg-4">
          <div class="card">
            <img class="card-img-top" src="<?php echo $member_image; ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?php echo $post_title; ?> <?php if( get_field('member_position') ): ?>(<?php echo $member_position; ?>)<?php endif; ?></h4>
              <div class="card-text"><?php echo $member_content; ?></div>
            </div>
          </div>
        </div>
        <?php endwhile;?>
        <?php	endif; wp_reset_query(); ?>

      </div>

  </div>
  </section>