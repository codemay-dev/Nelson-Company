<?php // Post Single View
get_header();

if( have_rows('content_panels') ):

  locate_template('parts/contentpanels.php', true);

else: ?>

  <div class="col-12 contentPanel">
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="contentContent row align-items-center justify-content-around">

              <div class="col-12 col-lg-9 innerBox align-self-start">
                <div class="content row justify-content-center">
                  <div class="col-12 col-lg-10">
                    <?php if (have_posts()) : ?>
                      <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
  </div>

<?php endif;

get_footer(); ?>