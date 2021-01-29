<?php // Header File ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<?php locate_template('parts/head-content.php', true); ?>

<body <?php body_class(); ?>>

  <?php // Body Area Embed
    if( get_field('body_area_embed',$postID) ) {
      $bodyEmbed = get_field('body_area_embed',$postID);
    } elseif( get_field('body_area_embed','option') ) {
      $bodyEmbed = get_field('body_area_embed','option');
    } ?>

    <?php if( $bodyEmbed ) { ?>

      <!-- Body Area Emedded Code -->

        <?php echo $bodyEmbed; ?>
      
      <!-- END Body Area Emedded Code -->
    
    <?php } ?>

<div id="wrap" class="container-fluid">
  <header class="row justify-content-center">
    <?php if( get_field('default_header_logo','option') || get_field('scroll_header_logo','option') || is_nav_menu('Main Menu') ) { ?>
    <div id="topBar" class="col-12">
      <?php if( get_field('global_message','option') ) { ?>
      <div id="messageBar" class="row justify-content-center scrollOff">
        <div class="col-12 col-lg-8">
          <?php the_field('global_message','option') ?>
        </div>
      </div>
      <?php } ?>
      <div id="menuBar" class="row justify-content-center">
        <div class="col-12 col-xl-11">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto logo">
              <?php if( get_field('default_header_logo','option') && get_field('scroll_header_logo','option') ) { ?>
                <div class="defaultLogo">
                <a href="<?php bloginfo('siteurl'); ?>">
                  <?php if( get_field('default_header_logo','option') ) {
                          $img_id_default = get_field('default_header_logo','option');
                          $size = 'thumbnail';
                          $image_default = wp_get_attachment_image_src( $img_id_default, $size ); ?>
                          <img src="<?php echo $image_default[0]; ?>" class="defaultLogo" />
                  <?php } ?>
                </a>
                </div>
                <div class="scrollLogo">
                <a href="<?php bloginfo('siteurl'); ?>">
                  <?php if( get_field('scroll_header_logo','option') ) {
                          $img_id_scroll = get_field('scroll_header_logo','option');
                          $size = 'thumbnail';
                          $image_scroll = wp_get_attachment_image_src( $img_id_scroll, $size ); ?>
                          <img src="<?php echo $image_scroll[0]; ?>" class="scrollLogo" />
                  <?php } ?>
                </a>
                </div>
              <?php } elseif( get_field('default_header_logo','option') ) { ?>
                <div class="singleLogo">
                <a href="<?php bloginfo('siteurl'); ?>">
                  <?php if( get_field('default_header_logo','option') ) {
                          $img_id_default = get_field('default_header_logo','option');
                          $size = 'thumbnail';
                          $image_default = wp_get_attachment_image_src( $img_id_default, $size ); ?>
                          <img src="<?php echo $image_default[0]; ?>" class="singleLogo" />
                  <?php } ?>
                </a>
                </div>
              <?php } elseif( get_field('scroll_header_logo','option') ) { ?>
                <div class="singleLogo">
                <a href="<?php bloginfo('siteurl'); ?>">
                  <?php if( get_field('scroll_header_logo','option') ) {
                          $img_id_scroll = get_field('scroll_header_logo','option');
                          $size = 'thumbnail';
                          $image_scroll = wp_get_attachment_image_src( $img_id_scroll, $size ); ?>
                          <img src="<?php echo $image_scroll[0]; ?>" class="scrollLogo" />
                  <?php } ?>
                </a>
                </div>
              <?php } ?>
            </div>
            <div class="col-auto menu desktop d-none d-xl-block">
              <nav class="navbar navbar-expand-xl">
                <?php locate_template('menus/main-menu.php', true); ?>
              </nav>
            </div>
            <!-- <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>
            <div class="col col-xl-auto d-none d-xl-block text-right">
              <ul class="icons">
                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/search-icon.png" /></a></li>
                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/checkout-icon.png" /></a></li>
                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/user-icon.png" /></a></li>
              </ul>
            </div>
            <?php } ?> -->
            <div class="col-auto menu mobile d-block d-xl-none">
              <nav class="navbar navbar-expand-xl">
                <?php locate_template('menus/mobile-menu.php', true); ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if( is_home() || is_category() || is_tag() || is_tax() || is_archive() || is_search() ) {
        locate_template('parts/index-heropanel.php', true);
      } elseif( is_single() ) {
        locate_template('parts/single-heropanel.php', true);
      } else {
        locate_template('parts/heropanels.php', true);
      } ?>
  </header>