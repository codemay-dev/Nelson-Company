<?php // Search Results Page
get_header(); ?>

  <div id="indexPanel" class="row justify-content-center">
    <div class="col-12 col-lg-8">

      <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" class="row indexRow">
          <?php if( has_post_thumbnail() ) { ?>
            <div class="col-12 col-xl-4 align-self-center indexImage">
              <?php the_post_thumbnail('medium', array('class' => '')); ?>
            </div>
            <div class="col-12 col-xl-8 indexInfo">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
              <p><a href="<?php the_permalink(); ?>" class="btn btn-hollow">Read More</a></p>
            </div>
          <?php } else { ?>
            <div class="col-12 indexInfo">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
              <p><a href="<?php the_permalink(); ?>" class="btn btn-hollow">Read More</a></p>
            </div>
          <?php } ?>
        </div>

      <?php endwhile; ?>

      <?php else : ?>

        <h4>Nothing was found. Try a different search.</h4>

      <?php endif; ?>
    </div>

    <div id="sidebar" class="col-12 col-lg-4">
      <?php get_sidebar('blog'); ?>
    </div>

  </div>

  <div id="pageinationPanel" class="row justify-content-center">
    <div class="col-12 text-center">
      <?php include (TEMPLATEPATH . '/pagination.php'); ?>
    </div>
  </div>

<?php get_footer(); ?>