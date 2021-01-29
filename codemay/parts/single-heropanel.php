<?php

if( have_rows('hero_panels','option') ): ?>

<?php $layout_counts = array(); ?>

<?php while ( have_rows('hero_panels','option') ) : the_row();

  $layout = get_row_layout();
  if( !isset($layout_counts[$layout]) ) {
    $layout_counts[$layout] = 0;
  }
  $layout_counts[$layout]++;
  $class = 'even';

/* Hero Content
----------------------------------------------------------------------------------------------------------------------------------*/
if( get_row_layout() == 'hero_content' ): 

// Get overlay color
$featPanel_hex_color = get_sub_field('overlay_color','option');
$featPanel_RGB_color = hex2rgb($featPanel_hex_color);
$featPanel_overlay_color = implode(",", $featPanel_RGB_color); ?>

<?php if( get_sub_field('bg_type','option') == 'image' ) {

  if( get_sub_field('bg_mobile','option') ) {
    if( wp_is_mobile() ) {

      // Get background images
      $img_id_mobile = get_sub_field('bg_mobile','option');
      $size = 'large';
      $imageMobile = wp_get_attachment_image_src( $img_id_mobile, $size ); ?>

    <div 
      id="hero" 
      class="col-12 heroPanel 
              <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
              <?php if( get_sub_field('custom_class','option') ) { ?> <?php the_sub_field('custom_class','option') ?><?php } ?>" 
      style="background-image: url('<?php echo $imageMobile[0]; ?>'); 
              background-position: <?php the_sub_field('horz_align_mob','option') ?> <?php the_sub_field('vert_align_mob','option') ?>; 
              <?php if(get_sub_field('panel_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>min-height:<?php the_sub_field('panel_height','option') ?>px;<?php } ?>" 
      data-showDate="<?php the_sub_field('show_date','option') ?>" 
      data-hideDate="<?php the_sub_field('hide_date','option') ?>"
    >

    <?php } else {

      // Get background images
      $img_id_desk = get_sub_field('bg_desk','option');
      $size = 'large';
      $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

      <div 
        id="hero" 
        class="col-12 heroPanel 
                <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
                <?php if( get_sub_field('custom_class','option') ) { ?> <?php the_sub_field('custom_class','option') ?><?php } ?>" 
        style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                background-position: <?php the_sub_field('horz_align_desk','option') ?> <?php the_sub_field('vert_align_desk','option') ?>; 
                <?php if(get_sub_field('panel_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>min-height:<?php the_sub_field('panel_height','option') ?>px;<?php } ?>" 
        data-showDate="<?php the_sub_field('show_date','option') ?>" 
        data-hideDate="<?php the_sub_field('hide_date','option') ?>"
      >

    <?php }
  } else {

    // Get background images
    $img_id_desk = get_sub_field('bg_desk','option');
    $size = 'large';
    $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

    <div 
      id="hero" 
      class="col-12 heroPanel 
              <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
              <?php if( get_sub_field('custom_class','option') ) { ?> <?php the_sub_field('custom_class','option') ?><?php } ?>" 
      style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
              background-position: <?php the_sub_field('horz_align_desk','option') ?> <?php the_sub_field('vert_align_desk','option') ?>; 
              <?php if(get_sub_field('panel_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>min-height:<?php the_sub_field('panel_height','option') ?>px;<?php } ?>" 
      data-showDate="<?php the_sub_field('show_date','option') ?>" 
      data-hideDate="<?php the_sub_field('hide_date','option') ?>"
    >

  <?php }
    
} elseif( get_sub_field('bg_type','option') == 'video' ) { ?>
  
  <div 
    id="hero" 
    class="col-12 heroPanel 
            <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
            <?php if( get_sub_field('custom_class','option') ) { ?> <?php the_sub_field('custom_class','option') ?><?php } ?>" 
    <?php if(get_sub_field('panel_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>style="min-height:<?php the_sub_field('panel_height','option') ?>px;"<?php } ?> 
    data-showDate="<?php the_sub_field('show_date','option') ?>" 
    data-hideDate="<?php the_sub_field('hide_date','option') ?>"
  >

    <div class="feature-video-responsive">
      <?php if( get_sub_field('mp4_mobile_vid','option') || get_sub_field('webm_mobile_vid','option') ) { ?>
        <video id="video" class="mobileVid" preload="auto" playsinline muted="true" loop autoplay>
          <source src="<?php the_sub_field('webm_mobile_vid','option') ?>" type="video/webm">
          <source src="<?php the_sub_field('mp4_mobile_vid','option') ?>" type="video/mp4">
        </video>
        <video id="video" class="desktopVid" preload="auto" playsinline muted="true" loop autoplay>
          <source src="<?php the_sub_field('webm_desk_vid','option') ?>" type="video/webm">
          <source src="<?php the_sub_field('mp4_desk_vid','option') ?>" type="video/mp4">
        </video>
      <?php } else { ?>
        <div class="video-responsive">
          <video id="video" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_sub_field('webm_desk_vid','option') ?>" type="video/webm">
            <source src="<?php the_sub_field('mp4_desk_vid','option') ?>" type="video/mp4">
          </video>
        </div>
      <?php } ?>
    </div>
    
<?php } ?>

  <?php if( wp_is_mobile() ) { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_mob','option') ?>);"<?php } ?>></div>
  <?php } else { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_desk','option') ?>);"<?php } ?>></div>
  <?php } ?>

  <div class="heroContent row justify-content-center <?php the_sub_field('panel_type','option') ?>">
    <div class="col-12 col-xl-11">
      <div class="row <?php the_sub_field('alignment','option') ?>" style="height:100%;">
        <div class="col-12 p-0" <?php if(get_sub_field('panel_width','option')) { ?>style="max-width:<?php the_sub_field('panel_width','option') ?>px;"<?php } ?>>
          <div class="row <?php the_sub_field('alignment_vert','option') ?> <?php the_sub_field('alignment','option') ?>" style="height:100%;color:<?php the_sub_field('text_color','option') ?>;">
            
            <?php $totalrows = count( get_sub_field('content','option') ); ?>
            
            <?php if( have_rows('content','option') ): $rownum = 1; while( have_rows('content','option') ) : the_row(); ?>

              <?php if( $totalrows == 1 ) { ?>
                <div class="heroText col-12 num<?php echo $rownum; ?> <?php the_sub_field('alignment','option') ?>">
              <?php } elseif( $totalrows == 2 ) { ?>
                <div class="heroText col-12 col-lg-5 num<?php echo $rownum; ?> <?php the_sub_field('alignment','option') ?>">
              <?php } ?>

                <?php if( get_sub_field('content','option') ) { ?>
                  <div class="content">
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
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style','option') ?> <?php the_sub_field('color','option') ?>"><?php the_sub_field('text','option') ?></a>
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
  </div>
</div>

<?php /* Hero Slider
----------------------------------------------------------------------------------------------------------------------------------*/
elseif( get_row_layout() == 'hero_slider' ): ?>

<script>
  $(document).ready(function() {

    if ( $('#heroSlider').children().length == 1 )
      $('#prev,#next').hide();

    $('#slideWrap:first-of-type').addClass('firstSlide');

    // Play first slide if video and pause slider
    $('#heroSlider').on('cycle-initialized', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
      if( $('.firstSlide').hasClass('videoSlide') ) {
        $('#heroSlider').cycle('pause');
      }
    });

    if( document.getElementById('video') ) {
      document.getElementById('video').muted = true;

      // Pause video on outgoing slide, and pause slider if new slide is video
      $('#heroSlider').on('cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        if( $(outgoingSlideEl).hasClass('videoSlide') ) {
          $('video', outgoingSlideEl)[0].pause();
        } else {
          $('#heroSlider').cycle('resume');
        }
      });

      // Play the video on the incoming slide
      $('#heroSlider').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        if( $(incomingSlideEl).hasClass('videoSlide') ) {
          $('video', incomingSlideEl)[0].play();
          $('#heroSlider').cycle('pause');
        } else {
          $('#heroSlider').cycle('resume');
        }
      });

      // Go to the next slide when video of current slide ends
      $(function() {
        $('video').on('ended', function() { 
          $('#heroSlider').cycle('next'); // trigger next slide 
        }); // addition end 
        $('video')[0].play();
      });
    }

  });
</script>

<?php // Full Screen Hero
if( get_sub_field('hero_type','option') == 'full' ) { ?>
  <script>
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $(document).ready(function() {
        $winHeight = window.innerHeight;
        $('#heroSlider').css('min-height',$winHeight);
      });
    } else {
      $(document).ready(function() {
        $winHeight = window.innerHeight;
        $('#heroSlider').css('min-height',$winHeight);
      });
      $(window).resize(function() {
        $winHeight = window.innerHeight;
        $('#heroSlider').css('min-height',$winHeight);
      });
    }
  </script>
<?php } ?>

<div 
  id="hero" 
  class="col-12 panelWrap 
          <?php the_sub_field('hero_type','option') ?> 
          <?php if(get_sub_field('hero_type','option') == 'fixed') { ?>fixed<?php } ?>
          <?php the_sub_field('custom_class','option') ?>" 
  <?php if(get_sub_field('hero_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>style="min-height:<?php the_sub_field('panel_height','option') ?>px;"<?php } ?> 
  data-showDate="<?php the_sub_field('show_date','option') ?>" 
  data-hideDate="<?php the_sub_field('hide_date','option') ?>"
>

  <div id="prev" class="chevron left"></div>

  <div id="heroSlider" class="row cycle-slideshow"
      data-cycle-fx="scrollHorz"
      data-cycle-timeout="5000"
      data-cycle-speed="500"
      data-cycle-slides="> div"
      data-cycle-prev="#prev"
      data-cycle-next="#next"
      data-cycle-swipe=true
      data-cycle-hide-non-active=true
      data-cycle-slide-active-class=active
      data-cycle-allow-wrap=true
      >

  <?php while ( have_rows('hero_slides','option') ) : the_row(); 
  
    // Get overlay color
    $featPanel_hex_color = get_sub_field('overlay_color');
    $featPanel_RGB_color = hex2rgb($featPanel_hex_color);
    $featPanel_overlay_color = implode(",", $featPanel_RGB_color); ?>

    <?php if( get_sub_field('slide_type') == 'image' ) {

      // Get background images
      $desk_img_id = get_sub_field('desk_bg_img');
      $mob_img_id = get_sub_field('mob_bg_img');
      $size = 'large';
      $deskImage = wp_get_attachment_image_src( $desk_img_id, $size );
      $mobImage = wp_get_attachment_image_src( $mob_img_id, $size ); ?>


      <?php if( wp_is_mobile() ) {
        if( get_sub_field('mob_bg_img','option') ) { ?>
          <div 
            id="slideWrap" 
            class="col-12 p-0 imageSlide" 
            style="background-image:url('<?php echo $mobImage[0]; ?>'); 
                    background-position: <?php the_sub_field('horz_align_mob','option') ?> <?php the_sub_field('vert_align_mob','option') ?>;"
          >
        <?php } else { ?>
          <div 
            id="slideWrap" 
            class="col-12 p-0 imageSlide" 
            style="background-image:url('<?php echo $deskImage[0]; ?>'); 
                    background-position: <?php the_sub_field('horz_align_desk','option') ?> <?php the_sub_field('vert_align_desk','option') ?>;"
          >
        <?php } ?>
      <?php } else { ?>
        <div 
          id="slideWrap" 
          class="col-12 p-0 imageSlide" 
          style="background-image:url('<?php echo $deskImage[0]; ?>'); 
                  background-position: <?php the_sub_field('horz_align_desk','option') ?> <?php the_sub_field('vert_align_desk','option') ?>;"
        >
      <?php } ?>

    <?php } elseif( get_sub_field('slide_type','option') == 'video' ) { ?>
      
      <div id="slideWrap" class="col-12 p-0 videoSlide">
        <div class="video-responsive">
          <?php if( get_sub_field('mp4_mob_vid','option') || get_sub_field('webm_mob_vid','option') ) { ?>
            <video id="video" class="mobileVid" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_mob_vid','option') ?>" type="video/webm">
              <source src="<?php the_sub_field('mp4_mob_vid','option') ?>" type="video/mp4">
            </video>
            <video id="video" class="desktopVid" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_desk_vid','option') ?>" type="video/webm" >  
              <source src="<?php the_sub_field('mp4_desk_vid','option') ?>" type="video/mp4" >
            </video>
          <?php } else { ?>
            <video id="video" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_desk_vid','option') ?>" type="video/webm">
              <source src="<?php the_sub_field('mp4_desk_vid','option') ?>" type="video/mp4">
            </video>
          <?php } ?>
        </div>

    <?php } ?>

      <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity','option') ?>);"<?php } ?>></div>

      <div class="heroContent row align-items-center justify-content-center">
        <div class="col-12 col-lg-11">
          <div class="row align-items-center <?php the_sub_field('alignment','option') ?>">
            <div class="col-12" <?php if(get_sub_field('content_width','option')) { ?>style="max-width:<?php the_sub_field('content_width','option') ?>px;"<?php } ?>>
              <div class="row">

                <?php $totalrows = count( get_sub_field('content','option') ); ?>
            
                <?php if( have_rows('content','option') ): $rownum = 1; while( have_rows('content','option') ) : the_row(); ?>  
          
                  <?php if( $totalrows == 1 ) { ?>
                    <div class="col-12 num<?php echo $rownum; ?>">
                  <?php } elseif( $totalrows == 2 ) { ?>
                    <div class="col-12 col-lg-6 num<?php echo $rownum; ?>">
                  <?php } ?>

                    <?php if( get_sub_field('content','option') ) { ?>
                      <div class="heroText"><?php the_sub_field('content','option') ?></div>
                    <?php } ?>

                    <div class="heroBtns <?php the_sub_field('button_alignment','option') ?>">

                    <?php if( have_rows('buttons','option') ) {

                        while( have_rows('buttons','option') ) : the_row();

                          $link = get_sub_field('link','option');
                          if( $link ) {
                            $link_url = $link['url'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          } ?>

                          <a href="<?php the_sub_field('link','option') ?>" class="btn btn-<?php the_sub_field('type','option') ?> <?php the_sub_field('color','option') ?>"><?php the_sub_field('text','option') ?></a>

                        <?php endwhile;

                    } ?>

                    </div>
                  </div>

                <?php $rownum++; endwhile; endif; ?>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  <?php endwhile; ?>

  </div>

  <div id="next" class="chevron right"></div>

</div>

<?php // Closing the Panel Group
  endif; endwhile; ?>

<?php else : ?>

  <div id="noHero" class="col-12">
    
  </div>

<?php endif; ?>