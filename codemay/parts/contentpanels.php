<?php if( have_rows('content_panels') ): ?>

  <main id="contentPanels" class="row justify-content-center">
  
    <?php $layout_counts = array();

    while ( have_rows('content_panels') ) : the_row();

      $layout = get_row_layout();
      if( !isset($layout_counts[$layout]) ) {
        $layout_counts[$layout] = 0;
      }
      $layout_counts[$layout]++;
      $class = 'even';

/* Content Panel
----------------------------------------------------------------------------------------------------------------------------------*/
if( get_row_layout() == 'content_panel' ): 

  // Count the rows
  $totalrows = count( get_sub_field('content_box') ); ?>

  <div
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>"
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  >  
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="contentContent row align-items-center justify-content-around">

          <?php if( have_rows('content_box') ): ?>

            <?php while( have_rows('content_box') ): the_row(); ?>

              <?php if( $totalrows == 1 ) { ?>
                <div class="col-12 innerBox align-self-<?php the_sub_field('vertical_alignment') ?>">
              <?php } elseif( $totalrows == 2 ) { ?>
                <div class="col-12 col-md-6 innerBox align-self-<?php the_sub_field('vertical_alignment') ?>">
              <?php } elseif( $totalrows == 3 ) { ?>
                <div class="col-12 col-lg-4 innerBox align-self-<?php the_sub_field('vertical_alignment') ?>">
              <?php } ?>
                <div class="content row justify-content-center">
                  <div class="col-12">
                    <?php the_sub_field('content') ?>

                    <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                        
                      $link = get_sub_field('link');
                      if( $link ) {
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; 
                      } ?>

                      <div class="btns <?php the_sub_field('alignment') ?>">
                        <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                            <?php the_sub_field('text') ?>
                          </a>
                        <?php } ?>
                      </div>

                    <?php endwhile; endif; ?>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

<?php /* Content Tabs
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'content_tabs' ): 

  // Count the rows
  $totalrows = count( get_sub_field('content_box') ); ?>

  <script>
    $(document).ready(function() {
      $('#myTab > li:first-of-type a').addClass('active show');
      $('#myTabContent > div:first-of-type').addClass('show active');
    });
  </script>

  <div
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 contentPanel<?php if( get_sub_field('custom_class') ) { ?><?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>" 
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  >  
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="contentContent row align-items-center justify-content-around">

        <?php /* Tabs */ if( have_rows('content_box') ): $rownum = 1; ?>
          
          <div class="col-12 tabBox">
            <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">

            <?php while( have_rows('content_box') ): the_row(); ?>
              
              <li class="nav-item">
                <a class="nav-link" id="num<?php echo $rownum; ?>-tab" data-toggle="tab" href="#num<?php echo $rownum; ?>" role="tab" aria-controls="num<?php echo $rownum; ?>">
                  <h2><strong><?php the_sub_field('tab_title') ?></strong></h2>
                </a>
              </li>

            <?php $rownum++; endwhile; ?>

            </ul>
          </div>

          <?php endif; ?>
        
          <?php /* Content */ if( have_rows('content_box') ): $rownum = 1; ?>

            <div class="col-12">  
              <div class="tab-content" id="myTabContent">

              <?php while( have_rows('content_box') ): the_row(); ?>

              <div class="tab-pane fade" id="num<?php echo $rownum; ?>" role="tabpanel" aria-labelledby="num<?php echo $rownum; ?>-tab">
                <div class="col-12 innerBox align-self-<?php the_sub_field('vertical_alignment') ?>">

                  <div class="content row justify-content-center">
                    <div class="col-12">
                      <?php the_sub_field('content') ?>

                      <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                          
                        $link = get_sub_field('link');
                        if( $link ) {
                          $link_url = $link['url'];
                          $link_target = $link['target'] ? $link['target'] : '_self'; 
                        } ?>

                        <div class="btns <?php the_sub_field('alignment') ?>">
                          <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                              <?php the_sub_field('text') ?>
                            </a>
                          <?php } ?>
                        </div>

                      <?php endwhile; endif; ?>
                    </div>
                  </div>
                </div>
              </div>

              <?php $rownum++; endwhile; ?>
              
              </div>
            </div>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

<?php /* Content & Image Panel
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'content_image_panel' ):

  // Get image
  $img_id = get_sub_field('image');
  $size = 'large';
  $image = wp_get_attachment_image_src( $img_id, $size ); ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>" 
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  > 
    <div class="row justify-content-center">
      <?php if( get_sub_field('type') == 'normal' ) { ?>
      <div class="col-12 col-lg-11">
        <div class="contentImage row align-items-<?php the_sub_field('vertical_alignment') ?> justify-content-around">
            
          <div class="col-12 col-md-6 order-6 order-md-12 innerBox">
            <div class="content row justify-content-center">
              <div class="col-12">
                <?php the_sub_field('content'); ?>
              
                <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                    
                  $link = get_sub_field('link');
                  if( $link ) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; 
                  } ?>

                  <div class="btns <?php the_sub_field('alignment') ?>">
                    <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                        <?php the_sub_field('text') ?>
                      </a>
                    <?php } ?>
                  </div>

                <?php endwhile; endif; ?>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 <?php the_sub_field('layout') ?> innerImg <?php the_sub_field('img_align') ?>">
            <img src="<?php echo $image[0]; ?>" />
          </div>

        </div>
      </div>
      <?php } elseif( get_sub_field('type') == 'full' ) { ?>
      <div class="col-12 full">
        <div class="contentImage row align-items-<?php the_sub_field('vertical_alignment') ?> justify-content-around">
          
          <div class="col-12 col-md-6 order-6 order-md-12 innerBox">
            <div class="content row justify-content-center">
              <div class="col-12">
                <?php the_sub_field('content'); ?>
                
                <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                    
                  $link = get_sub_field('link');
                  if( $link ) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; 
                  } ?>

                  <div class="btns <?php the_sub_field('alignment') ?>">
                    <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                        <?php the_sub_field('text') ?>
                      </a>
                    <?php } ?>
                  </div>

                <?php endwhile; endif; ?>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 <?php the_sub_field('layout') ?> innerImg <?php the_sub_field('img_align') ?>" 
            style="background-image: url('<?php echo $image[0]; ?>');background-size:cover;"
          >
            <img src="<?php echo $image[0]; ?>" style="opacity:0;" />
          </div>

        </div>
      </div>
      <?php } elseif( get_sub_field('type') == 'small' ) { ?>
        <div class="col-12 col-lg-11 smallImg">
          <div class="contentImage row align-items-<?php the_sub_field('vertical_alignment') ?> justify-content-around">
            
            <div class="col-12 col-md-9 order-6 order-md-12 innerBox">
              <div class="content row justify-content-center">
                <div class="col-12">
                  <?php the_sub_field('content'); ?>
                  
                  <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                      
                    $link = get_sub_field('link');
                    if( $link ) {
                      $link_url = $link['url'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; 
                    } ?>

                    <div class="btns <?php the_sub_field('alignment') ?>">
                      <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                          <?php the_sub_field('text') ?>
                        </a>
                      <?php } ?>
                    </div>

                  <?php endwhile; endif; ?>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-3 <?php the_sub_field('layout') ?> innerImg <?php the_sub_field('img_align') ?>">
              <img src="<?php echo $image[0]; ?>" />
            </div>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

<?php /* Content & Sidebar Panel
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'content_sidebar_panel' ): ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 contentSidebar contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>" 
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  >
    <div class="row mainContent align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="row align-items-start justify-content-between">

          <?php if(get_sub_field('sidebar_location') == 'right') { ?>
          
            <div class="col-12 col-sm-8 innerBox">
              <?php the_sub_field('content') ?>
            </div>
            
              <?php if( have_rows('sidebar') ) : ?>
                
                <div class="col-12 col-sm-4 innerSidebar">
                
                <?php while( have_rows('sidebar') ) : the_row(); ?>

                  <div class="sidebarBox">
                    <?php the_sub_field('content') ?>

                    <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                  
                      $link = get_sub_field('link');
                      if( $link ) {
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; 
                      } ?>

                      <div class="btns <?php the_sub_field('alignment') ?>">
                        <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                            <?php the_sub_field('text') ?>
                          </a>
                        <?php } ?>
                      </div>

                    <?php endwhile; endif; ?>
                  </div>

                <?php endwhile; ?>

                </div>

              <?php endif; ?>

          <?php } elseif(get_sub_field('sidebar_location') == 'left') { ?>
            
              <?php if( have_rows('sidebar') ) : ?>
                
                <div class="col-12 col-sm-4 innerSidebar">
                
                <?php while( have_rows('sidebar') ) : the_row(); ?>

                  <div class="sidebarBox">
                    <?php the_sub_field('content') ?>

                    <?php if( have_rows('button') ): while( have_rows('button') ): the_row();
                  
                      $link = get_sub_field('link');
                      if( $link ) {
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; 
                      } ?>

                      <div class="btns <?php the_sub_field('alignment') ?>">
                        <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                            <?php the_sub_field('text') ?>
                          </a>
                        <?php } ?>
                      </div>

                    <?php endwhile; endif; ?>
                  </div>

                <?php endwhile; ?>

                </div>

              <?php endif; ?>
            
            <div class="col-12 col-sm-8 innerBox">
              <?php the_sub_field('content') ?>
            </div>
            
          <?php } ?>

        </div>
      </div>
    </div>
  </div>

<?php /* Feature Boxes
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'feature_boxes' ):

  $totalrows = count( get_sub_field('boxes') ); ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="featureBoxes col-12 col-xl-11<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>"
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  >    
    <div class="row align-items-center justify-content-center">

    <?php if( have_rows('boxes') ): $rownum = 1; while ( have_rows('boxes') ) : the_row(); 
  
    // Get overlay color
    $feature_hex_color = get_sub_field('overlay_color','option');
    $feature_RGB_color = hex2rgb($feature_hex_color);
    $feature_overlay_color = implode(",", $feature_RGB_color);  
    
    // Get background image
    $img_id = get_sub_field('bg_image');
    $size = 'large';
    $image = wp_get_attachment_image_src( $img_id, $size ); ?>

      <?php if( get_sub_field('bg_image') ) { ?>
        <div class="col-12 col-md-4 featureBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>">
          <div class="row" 
            style="background-image: url('<?php echo $image[0]; ?>');
                    background-position: <?php the_sub_field('bg_horizontal_alignment') ?> <?php the_sub_field('bg_vertical_alignment') ?>;"
          >
            <?php if(get_sub_field('content_alignment_vert') == 'align-items-start') { ?>
            <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: linear-gradient(to bottom, rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>) 30% 20%, transparent 50%);"<?php } ?>></div>
            <?php } elseif(get_sub_field('content_alignment_vert') == 'align-items-end') { ?>
            <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: linear-gradient(to top, rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>) 30% 20%, transparent 50%);"<?php } ?>></div>
            <?php } elseif(get_sub_field('content_alignment_vert') == 'align-items-center') { ?>
            <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>);"<?php } ?>></div>
            <?php } ?>
            <div class="col-12 content">
              <div class="row <?php the_sub_field('content_alignment_vert') ?> <?php the_sub_field('content_alignment') ?>" style="height: 100%;">
                <div class="col-12<?php if( $totalrows == 1 || $totalrows == 2 ) { ?> col-lg-8 col-xl-7<?php } ?>" style="color:<?php the_sub_field('text_color') ?> !important;">
                  <?php the_sub_field('content') ?>
                
                  <div class="button col-12 align-self-end <?php the_sub_field('button_alignment') ?>">
                    
                    <?php if( have_rows('button') ): while( have_rows('button') ): the_row(); ?>
                    
                      <?php $link = get_sub_field('link');
                      if( $link ) {
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; 
                      } ?>

                      <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                          <?php the_sub_field('text') ?>
                        </a>
                      <?php } ?>

                    <?php endwhile; endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    
    <?php $rownum++; endwhile; endif; ?>

    </div>
  </div>

<?php /* Feature Slider
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'feature_slider' ): ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="featureSlide col-12 p-0<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
    <?php if( get_sub_field('hide_date') ) { ?> data-hideDate="<?php the_sub_field('hide_date') ?>" 
    <?php } if( get_sub_field('show_date') ) { ?> data-showDate="<?php the_sub_field('show_date') ?>" <?php } ?>
  >
    <div class="row align-items-center justify-content-center">
  
      <?php if( have_rows('slides') ): ?>

        <div class="col-12 col-xl-11 featureSlideWrap">
          <div id="featSlider" class="cycle-slideshow"
              data-cycle-fx=scrollHorz
              data-cycle-timeout=30000
              data-cycle-slides="> div"
              data-cycle-pause-on-hover=true
              data-cycle-auto-height=container
              data-cycle-center-horz=true
              data-cycle-prev="#featPrev"
              data-cycle-next="#featNext"
              data-cycle-swipe=true
              data-cycle-swipe-fx=scrollHorz
              data-cycle-hide-non-active=true
              >

      <?php while( have_rows('slides') ) : the_row();

        $totalrows = count( get_sub_field('boxes') );

        if( have_rows('boxes') ): $rownum = 1; ?>

          <div class="featureSlide col-12">
            <div class="row">

              <?php while ( have_rows('boxes') ) : the_row(); 
              
                // Get overlay color
                $feature_hex_color = get_sub_field('overlay_color','option');
                $feature_RGB_color = hex2rgb($feature_hex_color);
                $feature_overlay_color = implode(",", $feature_RGB_color);  
                
                // Get background image
                $img_id = get_sub_field('bg_image');
                $size = 'large';
                $image = wp_get_attachment_image_src( $img_id, $size ); ?>

                <?php if( get_sub_field('bg_image') ) { ?>
                  <?php if( $totalrows == 4 ) { ?>
                    <div class="col-12 col-sm-6 col-xl featureSlideBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" 
                      style="background-image: url('<?php echo $image[0]; ?>');
                              background-position: <?php the_sub_field('bg_horizontal_alignment') ?> <?php the_sub_field('bg_vertical_alignment') ?>;"
                    >
                  <?php } elseif( $totalrows == 3 ) { ?>
                    <div class="col-12 col-md featureSlideBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" 
                      style="background-image: url('<?php echo $image[0]; ?>');
                              background-position: <?php the_sub_field('bg_horizontal_alignment') ?> <?php the_sub_field('bg_vertical_alignment') ?>;"
                    >
                  <?php } else { ?>
                    <div class="col-12 col-md featureSlideBox row<?php echo $rownum; ?> total<?php echo $totalrows; ?>" 
                      style="background-image: url('<?php echo $image[0]; ?>');
                              background-position: <?php the_sub_field('bg_horizontal_alignment') ?> <?php the_sub_field('bg_vertical_alignment') ?>;"
                    >
                  <?php } ?>
                    <div class="row align-items-between">
                      <?php if(get_sub_field('content_alignment_vert') == 'align-items-start') { ?>
                        <div class="overlay" style="background: linear-gradient(to bottom, rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>) 30% 20%, transparent 50%);"></div>
                      <?php } elseif(get_sub_field('content_alignment_vert') == 'align-items-end') { ?>
                        <div class="overlay" style="background: linear-gradient(to top, rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>) 30% 20%, transparent 50%);"></div>
                      <?php } elseif(get_sub_field('content_alignment_vert') == 'align-items-center') { ?>
                        <div class="overlay" style="background: rgba(<?php echo $feature_overlay_color ?>,<?php the_sub_field('overlay_opacity') ?>);"></div>
                      <?php } ?>
                      <div class="col-12 content">
                        <div class="row <?php the_sub_field('content_alignment_vert') ?> <?php the_sub_field('content_alignment') ?>" style="height: 100%;">
                          <div class="col-12<?php if( $totalrows == 1 || $totalrows == 2 ) { ?> col-lg-8 col-xl-7<?php } ?>" style="color:<?php the_sub_field('text_color') ?> !important;">
                            <?php the_sub_field('content') ?>
                          
                            <div class="button col-12 align-self-end <?php the_sub_field('button_alignment') ?>">
                              
                              <?php if( have_rows('button') ): while( have_rows('button') ): the_row(); ?>
                              
                                <?php $link = get_sub_field('link');
                                if( $link ) {
                                  $link_url = $link['url'];
                                  $link_target = $link['target'] ? $link['target'] : '_self'; 
                                } ?>

                                <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                                  <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                                    <?php the_sub_field('text') ?>
                                  </a>
                                <?php } ?>

                              <?php endwhile; endif; ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                
              <?php $rownum++; endwhile; ?>
              
            </div>
          </div>

        <?php endif; 
        
      endwhile; ?>

        </div>
        <div id="featPrev" class="chevron left"></div>
        <div id="featNext" class="chevron right"></div>
      </div>

  <?php endif; ?>

  </div>

</div>

<?php /* Small Blocks
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'small_blocks' ): ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 blocksWrap contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
  >
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">

        <div class="smallBlocks row align-items-start <?php the_sub_field('alignment') ?>">

          <?php if( have_rows('blocks') ): ?>

            <?php while( have_rows('blocks') ): the_row();
            
              // Get images
              $img_id = get_sub_field('image');
              $size = 'medium';
              $image = wp_get_attachment_image_src( $img_id, $size ); ?>
            
              <div class="block col-12 col-sm-4 col-md-3">
                <div class="box">

                  <img src="<?php echo $image[0]; ?>" />

                  <div class="info">
                    <h3><?php the_sub_field('title') ?></h3>
                    <p><?php the_sub_field('text') ?></p>
                  </div>

                </div>
              </div>

            <?php endwhile; ?>

          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>

<?php /* Flip Blocks
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'flip_blocks' ): ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
    class="col-12 flipWrap contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
  >
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="flipBlocks row card-row <?php the_sub_field('alignment') ?>">

          <?php if( have_rows('flip_blocks') ): ?>

            <?php while( have_rows('flip_blocks') ): the_row(); 
            
              // Get images
              $img_id = get_sub_field('bg_image');
              $size = 'medium';
              $image = wp_get_attachment_image_src( $img_id, $size ); 
              
              $icon_img_id = get_sub_field('icon');
              $icon_size = 'thumbnail';
              $icon_image = wp_get_attachment_image_src( $icon_img_id, $icon_size ); 
              
              $hover_img_id = get_sub_field('hover_bg_image');
              $hover_size = 'medium';
              $hover_image = wp_get_attachment_image_src( $hover_img_id, $hover_size ); ?>

              <div class="col-lg-4 col-md-6 col-xs-12 card-single-col">
                <div class="row card-single-container">
                  <div class="col-12 card text-center">
                    <div class="row align-items-center card-hover text-center" 
                      style="background-image:<?php echo $hover_image[0]; ?>;
                              background-color:<?php the_sub_field('hover_bg_color') ?>;
                              color:<?php the_sub_field('hover_text_color') ?>;"
                    >
                      <div class="col-12 card-hover-content">
                        <div class="body">
                          <h5><?php the_sub_field('title') ?></h5>
                          <?php the_sub_field('hover_content') ?>
                          <?php $link = get_sub_field('btn_link');
                                if( $link ) {
                                  $link_url = $link['url'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';
                                } ?>

                                <?php if( get_sub_field('btn_text') && get_sub_field('btn_link') ) { ?>
                                  <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('btn_type') ?>">
                                    <?php the_sub_field('btn_text') ?>
                                  </a>
                                <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="row align-items-center card-not-hover text-center" 
                      style="background-image:<?php echo $image[0]; ?>;
                              background-color:<?php the_sub_field('bg_color') ?>;
                              color:<?php the_sub_field('text_color') ?>;"
                    > 
                      <div class="col-12 card-not-hover-content">  
                        <div class="body">
                          <img class="icon" src="<?php echo $icon_image[0]; ?>" />
                          <h5 class="title"><?php the_sub_field('title') ?></h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php endwhile; ?>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

<?php /* Feature Panel
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'feature_panel' ):

  // Get overlay color
  $featPanel_hex_color = get_sub_field('overlay_color');
  $featPanel_RGB_color = hex2rgb($featPanel_hex_color);
  $featPanel_overlay_color = implode(",", $featPanel_RGB_color);

  if( get_sub_field('bg_type') == 'image' ) {

    if( get_sub_field('bg_mobile') ) {
      if( wp_is_mobile() ) {

        // Get background images
        $img_id_mobile = get_sub_field('bg_mobile');
        $size = 'large';
        $imageMobile = wp_get_attachment_image_src( $img_id_mobile, $size ); ?>

      <div 
        <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?>
        class="col-12 featurePanel contentPanel <?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>" 
        style="background-image: url('<?php echo $imageMobile[0]; ?>'); 
                background-position: <?php the_sub_field('horz_align_mob') ?> <?php the_sub_field('vert_align_mob') ?>; 
                background-size: <?php the_sub_field('mobile_size') ?>; 
                <?php if(get_sub_field('panel_type') == 'fixed') { ?>min-height:<?php the_sub_field('panel_height') ?>px;<?php } ?>" 
        data-showDate="<?php the_sub_field('show_date') ?>" data-hideDate="<?php the_sub_field('hide_date') ?>"
      >

      <?php } else {

        // Get background images
        $img_id_desk = get_sub_field('bg_desk');
        $size = 'large';
        $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

        <div 
          <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
          class="col-12 featurePanel contentPanel <?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>" 
          style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                  background-position: <?php the_sub_field('horz_align_desk') ?> <?php the_sub_field('vert_align_desk') ?>; 
                  background-size: <?php the_sub_field('desk_size') ?>; 
                  <?php if(get_sub_field('panel_type') == 'fixed') { ?>min-height:<?php the_sub_field('panel_height') ?>px;<?php } ?>" 
                  data-showDate="<?php the_sub_field('show_date') ?>" data-hideDate="<?php the_sub_field('hide_date') ?>"
        >

      <?php }
    } else {

      // Get background images
      $img_id_desk = get_sub_field('bg_desk');
      $size = 'large';
      $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

      <div 
        <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
        class="col-12 featurePanel contentPanel <?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>" 
        style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                background-position: <?php the_sub_field('horz_align_desk') ?> <?php the_sub_field('vert_align_desk') ?>; 
                background-size: <?php the_sub_field('desk_size') ?>; 
                <?php if(get_sub_field('panel_type') == 'fixed') { ?>min-height:<?php the_sub_field('panel_height') ?>px;<?php } ?>" 
                data-showDate="<?php the_sub_field('show_date') ?>" data-hideDate="<?php the_sub_field('hide_date') ?>"
      >

    <?php }
      
  } elseif( get_sub_field('bg_type') == 'video' ) { ?>
    
    <div 
      <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
      class="col-12 featurePanel contentPanel <?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
      <?php if(get_sub_field('panel_type') == 'fixed') { ?>style="min-height:<?php the_sub_field('panel_height') ?>px;"<?php } ?> 
      data-showDate="<?php the_sub_field('show_date') ?>" data-hideDate="<?php the_sub_field('hide_date') ?>"
    >

      <div class="feature-video-responsive">
        <?php if( get_sub_field('mp4_mobile_vid') || get_sub_field('webm_mobile_vid') ) { ?>
          <video id="video" class="mobileVid" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_sub_field('webm_mobile_vid') ?>" type="video/webm">
            <source src="<?php the_sub_field('mp4_mobile_vid') ?>" type="video/mp4">
          </video>
          <video id="video" class="desktopVid" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_sub_field('webm_desk_vid') ?>" type="video/webm">
            <source src="<?php the_sub_field('mp4_desk_vid') ?>" type="video/mp4">
          </video>
        <?php } else { ?>
          <div class="video-responsive">
            <video id="video" preload="auto" playsinline muted="true" loop autoplay>
              <source src="<?php the_sub_field('webm_desk_vid') ?>" type="video/webm">
              <source src="<?php the_sub_field('mp4_desk_vid') ?>" type="video/mp4">
            </video>
          </div>
        <?php } ?>
      </div>
      
  <?php } ?>

    <?php if( wp_is_mobile() ) { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_mob') ?>);"<?php } ?>></div>
    <?php } else { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_desk') ?>);"<?php } ?>></div>
    <?php } ?>

    <div class="row <?php the_sub_field('alignment') ?> <?php the_sub_field('panel_type') ?>">
      <div class="col-12 col-xl-11">
        <div class="row <?php the_sub_field('alignment_vert') ?>" style="height:100%; color:<?php the_sub_field('text_color') ?>;">
          
          <?php $totalrows = count( get_sub_field('content') ); ?>
          
          <?php if( have_rows('content') ): $rownum = 1; while( have_rows('content') ) : the_row(); ?>

            <?php if( $totalrows == 1 ) { ?>
              <div class="feature col-12 num<?php echo $rownum; ?> <?php the_sub_field('alignment') ?>">
            <?php } elseif( $totalrows == 2 ) { ?>
              <div class="feature col-12 col-lg-5 num<?php echo $rownum; ?> <?php the_sub_field('alignment') ?>">
            <?php } ?>

              <?php if( get_sub_field('content') ) { ?>
                <div class="content">
                  <?php the_sub_field('content') ?>
                </div>
              <?php } ?>

              <div class="button">

              <?php if( have_rows('buttons') ) {

                while( have_rows('buttons') ) : the_row();

                  $link = get_sub_field('link');
                  if( $link ) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                  } ?>

                    <?php if( get_sub_field('text') && get_sub_field('link') ) { ?>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style') ?>">
                        <?php the_sub_field('text') ?>
                      </a>
                    <?php } ?>

                <?php endwhile;

              } ?>

              </div>
            </div>

          <?php $rownum++; endwhile; endif; ?>  
        

        </div>
      </div>
    </div>
  </div>

<?php /* Gallery
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'gallery' ):
  
  // Get gallery images
  $images = get_sub_field('gallery_images');
  if( $images ): ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
    class="col-12 galleryWrap contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
  >
      <div class="row align-items-center justify-content-center">
        
        <div class="col-12">
          <?php if( get_sub_field('intro') ) { ?>
            <div class="row">
              <div class="col-12 galleryContent">
                <?php the_sub_field('intro') ?>
              </div>
            </div>
          <?php } ?>

          <div class="row">
            <div class="col-12">
              <div class="imgList row align-items-center justify-content-center">

                <?php $i=1; foreach( $images as $image ) { ?>

                <div class="galleryImg col-12 col-sm-auto"><a href="<?php echo $image['sizes']['large']; ?>" rel="lightbox"><img src="<?php echo $image['sizes']['medium']; ?>" /></a></div>
              
                <?php if( $i++ == 12 ) break; } ?>
              
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>

  <?php endif; ?>

<?php /* Testimonial Slider
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'testimonial_slider' ):

  // Get category info
  $queried_object = get_queried_object();
  $term_id = $queried_object->term_id;
  $term = get_sub_field('category', $term_id);

  if( $term ) {
    $args = array(
      'numberposts'	=> -1,
      'post_type'		=> 'testimonial',
      'tax_query' => array(
        array(
        'taxonomy' => 'category',
        'terms' => $term,
        'field' => 'term_id'
      )),
      'orderby' => 'rand',
    );
  } else {
    $args = array(
      'numberposts'	=> -1,
      'post_type'		=> 'testimonial',
      'orderby' => 'rand',
    );
  }

  $the_query = new WP_Query( $args ); 

  if( $the_query->have_posts() ): ?>

    <div 
      <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
      class="col-12 testSliderWrap contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>" 
    >
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <?php if( get_sub_field('intro') ) { ?>
            <div class="row align-items-center justify-content-center">
              <div class="col-12">
                <?php the_sub_field('intro') ?>
              </div>
            </div>
          <?php } ?>

          <i class="fa fa-quote-left" aria-hidden="true"></i>

          <div class="row align-items-center justify-content-center">
            <div class="col-0 col-lg-1 p-0">
              <div id="testPrev" class="chevron left"></div>
            </div>

            <div class="col-12 col-lg-10">
              <div id="testSlider" class="cycle-slideshow"
                  data-cycle-fx=scrollHorz
                  data-cycle-timeout=30000
                  data-cycle-slides="> div"
                  data-cycle-pause-on-hover=true
                  data-cycle-auto-height=calc
                  data-cycle-center-horz=true
                  data-cycle-center-vert=true
                  data-cycle-prev="#testPrev"
                  data-cycle-next="#testNext"
                  data-cycle-swipe=true
                  data-cycle-swipe-fx=scrollHorz
                  >

                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  
                  <div id="slide" class="testSlide">
                    <div class="testText"><?php the_field('testimonial_text') ?></div>
                    <h4 class="author"><?php the_title(); ?></h4>
                    <div class="addInfo"><?php the_field('testimonial_add') ?></div>
                  </div>

                <?php endwhile; ?>
              </div>
            </div>

            <div class="col-0 col-lg-1 p-0">
              <div id="testNext" class="chevron right"></div>
            </div>
          </div>

        </div>
      </div>
    </div>

  <?php endif; wp_reset_postdata();?>

<?php /* FAQ Panel
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'faq_panel' ):

  // Get category info
  $queried_object = get_queried_object();
  $term_id = $queried_object->term_id;
  $term = get_sub_field('category', $term_id); ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
    class="col-12 faqPanel contentPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>" 
  >
    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-lg-11">
        <?php if( get_sub_field('intro') ) { ?>
          <?php the_sub_field('intro') ?>
        <?php } ?>

        <div id="accordion<?php if( get_sub_field('custom_id') ) {?>-<?php the_sub_field('custom_id') ?><?php } ?>">
        
          <?php if( $term ) {
            $args = array(
              'post_type' => 'faq',
              'tax_query' => array(
                array(
                'taxonomy' => 'category',
                'terms' => $term,
                'field' => 'term_id'
              )),
              'posts_per_page' => -1
            );
          } else {
            $args = array(
              'post_type' => 'faq',
              'posts_per_page' => -1
            );
          }
          $the_query = new WP_Query( $args ); 
          $i = 0; if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); $i++; ?>

            <div class="card">
              <div class="card-header" id="heading<?php echo $i ?>">
                <h5>
                  <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo $i ?><?php if( get_sub_field('custom_id') ) {?>-<?php the_sub_field('custom_id') ?><?php } ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?><?php if( get_sub_field('custom_id') ) {?>-<?php the_sub_field('custom_id') ?><?php } ?>">
                    <?php the_title(); ?>
                    <div class="dirLines">
                      <span style="background: <?php the_sub_field('text_color') ?>;" class="line1"></span>
                      <span style="background: <?php the_sub_field('text_color') ?>;" class="line2"></span>
                    </div>
                  </a>
                </h5>
              </div>
              <div id="collapse<?php echo $i ?><?php if( get_sub_field('custom_id') ) {?>-<?php the_sub_field('custom_id') ?><?php } ?>" class="panel-collapse collapse" data-parent="#accordion<?php if( get_sub_field('custom_id') ) {?>-<?php the_sub_field('custom_id') ?><?php } ?>" aria-labelledby="heading<?php echo $i ?>">
                <div class="card-body panel-body">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>

          <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>
      </div>
    </div>
  </div>

<?php // Location Panel
elseif( get_row_layout() == 'location' ): ?>

  <?php require_once('acf-googlemap.php'); ?>

  <div 
    <?php if( get_sub_field('custom_id') ) {?>id="<?php the_sub_field('custom_id') ?>"<?php } ?> 
    class="col-12 locationPanel<?php if( get_sub_field('custom_class') ) { ?> <?php the_sub_field('custom_class') ?><?php } ?>"
  >
    <div class="row justify-content-center">
      
      <?php $location = get_field('google_map','option');
      if( !empty($location) ): ?>
        <div class="acf-map">
          <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
      <?php endif; ?>

      <div class="col-11">
        <div class="row justify-content-start">
          <div class="locationBox col-auto">
            <h4><?php bloginfo('name') ?></h4>
            <?php if( get_field('address_one','option') ) { ?>
              <p><?php the_field('address_one','option') ?><?php if( get_field('address_two','option') ) { ?>, <?php the_field('address_two','option') ?><?php } ?>
              <br />
              <?php the_field('city','option') ?>, <?php the_field('state','option') ?> <?php the_field('zip','option') ?></p>
            <?php } ?>
            <?php if( get_field('phone','option') ) { ?>
              <p><?php the_field('phone','option') ?></p>
            <?php } ?>
            <?php if( get_field('email','option') ) { ?>
              <p><?php the_field('email','option') ?></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php // CTA Panel
elseif( get_row_layout() == 'cta' ):

  // Get overlay color
  $featPanel_hex_color = get_field('cta_overlay_color','option');
  $featPanel_RGB_color = hex2rgb($featPanel_hex_color);
  $featPanel_overlay_color = implode(",", $featPanel_RGB_color);

  if( get_field('cta_bg_type','option') == 'image' ) {

    if( get_field('cta_bg_mobile','option') ) {
      if( wp_is_mobile() ) {

        // Get background images
        $img_id_mobile = get_field('cta_bg_mobile','option');
        $size = 'large';
        $imageMobile = wp_get_attachment_image_src( $img_id_mobile, $size ); ?>

      <div 
        <?php if( get_field('cta_custom_id','option') ) {?>id="<?php the_field('cta_custom_id','option') ?>"<?php } ?> 
        class="col-12 ctaPanel contentPanel <?php the_field('cta_panel_type','option') ?> <?php if( get_field('cta_custom_class','option') ) { ?> <?php the_field('cta_custom_class','option') ?><?php } ?>" 
        style="background-image: url('<?php echo $imageMobile[0]; ?>'); 
                background-position: <?php the_field('cta_horz_align_mob','option') ?> <?php the_field('cta_vert_align_mob','option') ?>; 
                <?php if(get_field('cta_panel_type','option') == 'fixed') { ?>min-height:<?php the_field('cta_panel_height','option') ?>px;<?php } ?>" 
                data-showDate="<?php the_field('cta_show_date','option') ?>" 
                data-hideDate="<?php the_field('cta_hide_date','option') ?>"
      >

      <?php } else {

        // Get background images
        $img_id_desk = get_field('cta_bg_desk','option');
        $size = 'large';
        $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

        <div 
          <?php if( get_field('cta_custom_id','option') ) {?>id="<?php the_field('cta_custom_id','option') ?>"<?php } ?> 
          class="col-12 ctaPanel contentPanel <?php the_field('cta_panel_type','option') ?> <?php if( get_field('cta_custom_class','option') ) { ?> <?php the_field('cta_custom_class','option') ?><?php } ?>" 
          style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                  background-position: <?php the_field('cta_horz_align_desk','option') ?> <?php the_field('cta_vert_align_desk','option') ?>; 
                  <?php if(get_field('cta_panel_type','option') == 'fixed') { ?>min-height:<?php the_field('cta_panel_height','option') ?>px;<?php } ?>" 
                  data-showDate="<?php the_field('cta_show_date','option') ?>" 
                  data-hideDate="<?php the_field('cta_hide_date','option') ?>"
        >

      <?php }
    } else {

      // Get background images
      $img_id_desk = get_field('cta_bg_desk','option');
      $size = 'large';
      $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

      <div 
        <?php if( get_field('cta_custom_id','option') ) {?>id="<?php the_field('cta_custom_id','option') ?>"<?php } ?> 
        class="col-12 ctaPanel contentPanel <?php the_field('cta_panel_type','option') ?> <?php if( get_field('cta_custom_class','option') ) { ?> <?php the_field('cta_custom_class','option') ?><?php } ?>" 
        style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                background-position: <?php the_field('cta_horz_align_desk','option') ?> <?php the_field('cta_vert_align_desk','option') ?>; 
                <?php if(get_field('cta_panel_type','option') == 'fixed') { ?>min-height:<?php the_field('cta_panel_height','option') ?>px;<?php } ?>" 
                data-showDate="<?php the_field('cta_show_date','option') ?>" 
                data-hideDate="<?php the_field('cta_hide_date','option') ?>"
      >

    <?php }
      
  } elseif( get_field('cta_bg_type','option') == 'video' ) { ?>
    
    <div 
      <?php if( get_field('cta_custom_id','option') ) {?>id="<?php the_field('cta_custom_id','option') ?>"<?php } ?> 
      class="col-12 ctaPanel contentPanel <?php the_field('cta_panel_type','option') ?> <?php if( get_field('cta_custom_class','option') ) { ?> <?php the_field('cta_custom_class','option') ?><?php } ?>" 
      <?php if(get_field('cta_panel_type','option') == 'fixed') { ?>style="min-height:<?php the_field('cta_panel_height','option') ?>px;"<?php } ?> 
      data-showDate="<?php the_field('cta_show_date','option') ?>" 
      data-hideDate="<?php the_field('cta_hide_date','option') ?>"
    >

      <div class="cta-video-responsive">
        <?php if( get_field('cta_mp4_mobile_vid','option') || get_field('cta_webm_mobile_vid','option') ) { ?>
          <video id="video" class="mobileVid" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_field('cta_webm_mobile_vid','option') ?>" type="video/webm">
            <source src="<?php the_field('cta_mp4_mobile_vid','option') ?>" type="video/mp4">
          </video>
          <video id="video" class="desktopVid" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_field('cta_webm_desk_vid','option') ?>" type="video/webm">
            <source src="<?php the_field('cta_mp4_desk_vid','option') ?>" type="video/mp4">
          </video>
        <?php } else { ?>
          <div class="video-responsive">
            <video id="video" preload="auto" playsinline muted="true" loop autoplay>
              <source src="<?php the_field('cta_webm_desk_vid','option') ?>" type="video/webm">
              <source src="<?php the_field('cta_mp4_desk_vid','option') ?>" type="video/mp4">
            </video>
          </div>
        <?php } ?>
      </div>
      
  <?php } ?>

    <?php if( wp_is_mobile() ) { ?>
      <div class="overlay" style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_field('cta_overlay_opacity_mob','option') ?>);"></div>
    <?php } else { ?>
      <div class="overlay" style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_field('cta_overlay_opacity_desk','option') ?>);"></div>
    <?php } ?>

    <div class="row justify-content-center">
      <div class="col-12 col-xl-11" <?php if(get_field('cta_panel_width','option')) { ?>>
        <div class="row <?php the_field('cta_alignment_vert','option') ?> <?php the_field('cta_alignment','option') ?>" style="height:100%;">
          
          <?php $totalrows = count( get_field('cta_content','option') ); ?>
          
          <?php if( have_rows('cta_content','option') ): $rownum = 1; while( have_rows('cta_content','option') ) : the_row(); ?>

            <?php if( $totalrows == 1 ) { ?>
              <div class="feature col-12 num<?php echo $rownum; ?> <?php the_sub_field('alignment','option') ?>">
            <?php } elseif( $totalrows == 2 ) { ?>
              <div class="feature col-12 col-lg-5 num<?php echo $rownum; ?> <?php the_sub_field('alignment','option') ?>">
            <?php } ?>

              <?php if( get_sub_field('content','option') ) { ?>
                <div class="content" style="color:<?php the_field('cta_text_color','option') ?>;">
                  <?php the_sub_field('content','option') ?>
                </div>
              <?php } ?>

              <div class="button">

              <?php if( have_rows('buttons','option') ) {

                while( have_rows('buttons','option') ) : the_row();

                  $link = get_sub_field('link','option');
                  if( $link ) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                  } ?>

                    <?php if( get_sub_field('text','option') && get_sub_field('link','option') ) { ?>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style','option') ?>">
                        <?php the_sub_field('text','option') ?>
                      </a>
                    <?php } ?>

                <?php endwhile;

              } ?>

              </div>
            </div>

          <?php $rownum++; endwhile; ?>
          
          <?php endif; ?>
        
        </div>
      </div>
    </div>
  </div>

  <?php } endif; endwhile; ?>
  
</main>

<?php else : ?>

  <main id="noPanels" class="row align-items-start justify-content-center">
    <div class="col-12 col-lg-11">
      <div class="contentContent row align-items-start justify-content-around">

            <div class="col-12 innerBox align-self-start">
              <div class="content row justify-content-center">
                <div class="col-12 col-lg-10">
                  <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <!-- <h3><?php the_title(); ?></h3>   -->
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>

      </div>
    </div>
  </main>

<?php endif; ?>