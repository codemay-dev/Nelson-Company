<?php // Posts Archive
get_header(); ?>

<div id="indexPanel" class="row justify-content-center">
  <div class="col-12 text-center">
    <?php if( is_search() ) { ?>
      <h3 class="pagetitle">Search Results</h3>
    <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <h3 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h3>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      <h3 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h3 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h3>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h3 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h3>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h3 class="pagetitle">Archive for <?php the_time('Y'); ?></h3>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
      <h3 class="pagetitle">Author Archive</h3>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h3 class="pagetitle">Blog Archives</h3>
    <?php } ?>
  </div>

  <div class="col-12 col-lg-8">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

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

      <h5 class="pagetitle">Nothing Found</h5>

      <?php if ( is_category() ) { // If this is a category archive
        printf("<p>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
      } else if ( is_date() ) { // If this is a date archive
        echo("<p>Sorry, but there aren't any posts with this date.</p>");
      } else if ( is_author() ) { // If this is a category archive
        $userdata = get_userdatabylogin(get_query_var('author_name'));
        printf("<p>Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
      } else {
        echo("<p>No posts found.</p>");
      }
      get_search_form(); ?>

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