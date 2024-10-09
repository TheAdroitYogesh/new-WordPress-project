<?php // Tutorial Row
global $i, $page_title ;
$section_title			= get_sub_field('section_title');
$section_subtitle		= get_sub_field('section_subtitle');
?>

<section class="section optifit-challenge">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="title-xl mb-0"><?php echo $section_title;?></h2>
            <p><?php echo $section_subtitle;?></p>
        </div>
        <div class="row d-flex justify-content-center">
            <?php
				if( have_rows('box') ): ?>
				<?php
					while ( have_rows( 'box' ) ): the_row();
					$icon    = get_sub_field('icon');
					$title	 = get_sub_field('title');
					$content = get_sub_field('content');
				?>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="challenge-inner">
                    <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>"/>
                    <h2 class="mt-3 mb-3"><?php echo $title; ?></h2>
                    <p><?php echo $content; ?></p>
                </div>
            </div>
              <?php endwhile; ?>
		 <?php endif; ?>
        </div>
    </div>
</section>