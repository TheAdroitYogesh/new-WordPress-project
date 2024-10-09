<?php // Blog Row
global $i, $page_title ;

$section_heding       = get_sub_field('section_heding');
$section_title			  = get_sub_field('section_title');
$section_content		  = get_sub_field('section_content');
$faqs			            = get_sub_field('faqs', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section faq-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <div class="ques-ans">
      <div class="accordion" id="quesans">
        <?php
          $counter = 0;
          while ( have_rows( 'faqs' ) ): the_row(); $counter++;
          $faq_question			= get_sub_field('faq_question');
          $faq_answer		= get_sub_field('faq_answer');
        ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?php echo $counter;?>">
            <button class="accordion-button collapsed d-flex align-items-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter;?>" aria-expanded="false" aria-controls="collapse<?php echo $counter;?>">
              <?php echo $faq_question;?>
            </button>
          </h2>
          <div id="collapse<?php echo $counter;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $counter;?>" data-bs-parent="#quesans">
            <div class="accordion-body">
              <?php echo $faq_answer;?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>