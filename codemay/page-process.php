<?php // Template Name: Process

get_header();

$args1 = array(
  'post_type' => 'process',
  'posts_per_page' => -1,
  'order' => 'Asc',
  'orderby' => 'menu',
  'cat' => 17,
);

$args2 = array(
  'post_type' => 'process',
  'posts_per_page' => -1,
  'order' => 'Asc',
  'orderby' => 'menu',
  'cat' => 18,
);

$args3 = array(
  'post_type' => 'process',
  'posts_per_page' => -1,
  'order' => 'Asc',
  'orderby' => 'menu',
  'cat' => 19,
);

$query1 = new WP_Query($args1);
$query2 = new WP_Query($args2);
$query3 = new WP_Query($args3);
?>

  <div id="process" class="row justify-content-center">
    <div class="col-12 col-md-11 mb-5">
      <h3>General overview of our tax preparation process:</h3>
    </div>
    <div class="col-12">
      <div class="row align-items-start justify-content-around">
        <?php $i=100; if( $query1->have_posts() ) { ?>
        <div class="col-auto">
          <h6 class="client">Client</h6>
          <ul class="col1">

          <?php while($query1->have_posts() ) : $query1->the_post(); ?>

            <li id="box<?php echo $i ?>">
              <a href="#" data-toggle="modal" data-target="#modal<?php echo $i ?>"><?php the_title(); ?></a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $i ?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal<?php echo $i ?>"><?php the_title(); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>

          <?php $i++; endwhile; wp_reset_query(); ?>
          </ul>
        </div>
        <?php } $i=200; if( $query2->have_posts() ) { ?>
        <div class="col-auto align-self-center">
          <ul class="col2">
          <?php while($query2->have_posts() ) : $query2->the_post(); ?>

            <li id="box<?php echo $i ?>">
              <a href="#" data-toggle="modal" data-target="#modal<?php echo $i ?>"><?php the_title(); ?></a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $i ?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal<?php echo $i ?>"><?php the_title(); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>

          <?php $i++; endwhile; wp_reset_query(); ?>
          </ul>
        </div>
        <?php } $i=300; if( $query3->have_posts() ) { ?>
        <div class="col-auto">
          <h6 class="nelson">Nelson Company</h6>
          <ul class="col3">
          <?php while($query3->have_posts() ) : $query3->the_post(); ?>

            <li id="box<?php echo $i ?>">
              <a href="#" data-toggle="modal" data-target="#modal<?php echo $i ?>"><?php the_title(); ?></a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $i ?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal<?php echo $i ?>"><?php the_title(); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>

          <?php $i++; endwhile; wp_reset_query(); ?>
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

<?php get_footer();

?>