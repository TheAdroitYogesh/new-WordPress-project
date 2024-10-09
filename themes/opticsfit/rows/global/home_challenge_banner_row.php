<?php // Why Choose Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$right_side_image		= get_sub_field('right_image');
$logo		              = get_sub_field('logo');
$section_paragraph		    = get_sub_field('section_paragraph');
$section_button_name		= get_sub_field('section_button_name');
$section_button_link		= get_sub_field('section_button_link');
$section_background_image		= get_sub_field('section_background_image');
$logo_title		              = get_sub_field('logo_title');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section why-choose-sec"
  data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h2 class="title-xl"><?php echo $section_title;?></h2>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="prefet-fit pt-5 pb-5" style="background-image: url(<?php echo $section_background_image;?>);">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="top-content text-center mt-5">
                <h2 class="logo-heading"><img src="<?php echo $logo;?>" alt=""/><br><?php echo $logo_title	;?></h2>
                <p class="mt-2"><?php echo $section_paragraph;?></p>
                
                <img class="res-img" src="<?php echo $right_side_image;?>" alt="<?php echo $section_title;?>">
            </div>
            <div class="column-one ">
              <div class="row d-flex justify-content-center">
                <?php
                  while ( have_rows( 'box' ) ): the_row();
                 
                  $icon		= get_sub_field('icon');
                  $title		= get_sub_field('title');
                   $link		= get_sub_field('link');
								?>
                <div class="col-lg-4">
                  <a href="<?php echo $link;?>" >
                    <div class="heading-blocks d-flex align-items-center  p-2 cha-b mb-4">
							<img src="<?php echo $icon;?>" alt="<?php echo $title;?>">
							<span><?php echo $title;?></span>
					</div>
               
                 </a>
                </div>
                <?php endwhile; ?>
              </div>
            </div>
            <div class="cta text-center mt-5 mb-5 challenge-button">
              <a href="<?php echo $section_button_link;?>" class="btn btn-primary text-uppercase"><?php echo $section_button_name;?></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="column-two">
              <div class="column">
                <div class="image"><img src="<?php echo $right_side_image;?>" alt="<?php echo $section_title;?>"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="title-foot mt-5 text-center">
      <?php echo $footer_content;?>
    </footer>
  </div>
  </section>