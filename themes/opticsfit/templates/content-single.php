<?php $page_title   = get_the_title(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
			<section class="inner-banner background-image" style="background-image:url(<?php echo get_bloginfo('template_url'); ?>/images/inner-background.jpg)">
       
                          <div class="breadcrum-sec"><?php the_breadcrumb(); ?></div>
        
      </section>
      <section class="section why-choose-sec">
        <div class="container">
          <div class="choose-column">
                          <header class="title-head text-center mb-5">
                              <h1 class="title-xl"><?php the_title(); ?></h1>
                              <small><span><i class="fa fa-user"></i> By <?php the_author(); ?> | <?php the_time('F j, Y'); ?></span></small>
                          </header>
            <div class="entry-container">
              <article class="clearfix">
                <div class="media-materials text-center mb-4"><?php the_post_thumbnail(); ?></div>
                <div class="post-content-blog">
                  <?php the_content();?>
                </div>
              </article>

              <nav id="nav-below" class="clearfix">
                <div class="nav-previous pull-left">
                  <?php previous_post_link('%link', 'Previous Blog Post', true, ''); ?>
                </div>
                <div class="nav-next pull-right">
                  <?php next_post_link('%link', 'Next Blog Post', true, ''); ?>
                </div>
              </nav><!-- #nav-single -->
            </div>
          </div>
        </div>
      </section>
</article>