<?php // Posts Index
get_header(); ?>

<div id="indexPanel" class="row justify-content-center">
  <div class="col-12 col-lg-11">
    <div class="row align-items-start justify-content-center">
      <div class="col-12">

        <?php $i=0; if (have_posts()) : ?>

        <?php while (have_posts()) : the_post() ?>
          <div id="post-<?php the_ID(); ?>" class="row indexRow">
            <?php if( has_post_thumbnail() ) {
              if($i % 2 == 0) { ?>
                <div class="col-12 col-sm-4 col-lg-3 indexImage">
                  <?php the_post_thumbnail('medium', array('class' => '')); ?>
                </div>
                <div class="col-12 col-sm-8 col-lg-9 indexInfo">
                  <h3><?php the_title(); ?></h3>
                  <?php the_content(); ?>
                  <!-- <p><a href="<?php the_permalink(); ?>" class="btn btn-solid dark">Read More</a></p> -->
                </div>
              <?php } else { ?>
                <div class="col-12 col-sm-8 col-lg-9 indexInfo">
                  <h3><?php the_title(); ?></h3>
                  <?php the_content(); ?>
                  <!-- <p><a href="<?php the_permalink(); ?>" class="btn btn-solid dark">Read More</a></p> -->
                </div>
                <div class="col-12 col-sm-4 col-lg-3 indexImage">
                  <?php the_post_thumbnail('medium', array('class' => '')); ?>
                </div>
              <?php } ?>
            <?php } else { ?>
              <div class="col-12 indexInfo">
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <!-- <p><a href="<?php the_permalink(); ?>" class="btn btn-solid dark">Read More</a></p> -->
              </div>
            <?php } ?>
          </div>

        <?php $i++; endwhile; ?>

        <?php else : ?>

                <h3 class="pagetitle"><?php wp_title(''); ?></h3>

                <p>Sorry!</p>
                <p>There are no blog posts yet. Keep checking back for new content!</p>
                <br />
                <?php get_search_form(); ?>

        <?php endif; ?>

      </div>

      <!-- <div id="sidebar" class="col-12 col-lg-4">
        <?php get_sidebar('blog'); ?>
      </div> -->
    </div>
  </div>

</div>

<div id="pageinationPanel" class="row justify-content-center">
  <div class="col-12 text-center">
    <?php include (TEMPLATEPATH . '/pagination.php'); ?>
  </div>
</div>

<?php get_footer(); ?>