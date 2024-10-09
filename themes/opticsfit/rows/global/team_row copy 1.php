<?php // Team Row
global $i, $page_title, $background_colour;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section our-team" data-row="row-<?php echo $i; ?>">
	<div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
		<div class="row">
      <?php
        $args = array(
        'post_type'			=> 'team',
        'post_status'		=> 'publish',
        'orderby'			=> 'date',
        'order' 			=> 'desc',
        'posts_per_page'	=> -1
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
        <div class="team-block">
          <div class="image"><img src="<?php echo $member_image;?>" alt="" /></div>
          <div class="content">
            <h3 class="title-md"><?php echo $post_title;?></h3>
            <?php if ($member_position) echo '<span class="member-position">' . $member_position . ' </span>';?>
            <?php echo $member_content;?>
            <?php
              while ( have_rows( 'social_link' ) ): the_row();
              $facebook_link		  = get_sub_field('facebook_link');
              $twitter_link		    = get_sub_field('twitter_link');
              $instagram_link		  = get_sub_field('instagram_link');
              $linkedin_link		  = get_sub_field('linkedin_link');
            ?>
            <div class="social-links">
              <ul>
                <?php if( get_sub_field('twitter_link') ): ?>
                <li><a href="<?php echo $twitter_link;?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                <?php endif; ?>
                <?php if( get_sub_field('facebook_link') ): ?>
                <li><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                <?php endif; ?>
                <?php if( get_sub_field('instagram_link') ): ?>
                <li><a href="<?php echo $instagram_link; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                <?php endif; ?>
                <?php if( get_sub_field('linkedin_link') ): ?>
                <li><a href="<?php echo $linkedin_link;?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <?php endif; ?>
              </ul>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
      <?php endwhile;?>
		  <?php	endif; wp_reset_query(); ?>
    </div>
	</div>
</section>
