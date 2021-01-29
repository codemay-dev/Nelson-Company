<?php // Template Name: Home

get_header(); ?>

<div class="grid">
  <div class="item1 grid-item grid-item--height2">
    <div class="inside">
      <?php the_field('box1_content') ?>
    </div>
  </div>
  <div class="item2 grid-item">
    <div class="inside">
      <?php the_field('box2_content') ?>
    </div>
  </div>
  <div class="item3 grid-item">
    <div class="inside">
      <?php the_field('box3_content') ?>
    </div>
  </div>
</div>

<?php locate_template('parts/contentpanels.php', true);

get_footer();

?>