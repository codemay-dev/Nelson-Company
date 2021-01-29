<?php $posts_page_id = get_option('page_for_posts');

if( have_rows('hero_panels',$posts_page_id) ): ?>

<?php $layout_counts = array(); ?>

<?php while ( have_rows('hero_panels',$posts_page_id) ) : the_row();

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
$featPanel_hex_color = get_sub_field('overlay_color',$posts_page_id);
$featPanel_RGB_color = hex2rgb($featPanel_hex_color);
$featPanel_overlay_color = implode(",", $featPanel_RGB_color); ?>

<?php if( get_sub_field('bg_type',$posts_page_id) == 'image' ) {

  if( get_sub_field('bg_mobile',$posts_page_id) ) {
    if( wp_is_mobile() ) {

      // Get background images
      $img_id_mobile = get_sub_field('bg_mobile',$posts_page_id);
      $size = 'large';
      $imageMobile = wp_get_attachment_image_src( $img_id_mobile, $size ); ?>

    <div 
      id="hero" 
      class="col-12 heroPanel 
              <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
              <?php if( get_sub_field('custom_class',$posts_page_id) ) { ?> <?php the_sub_field('custom_class',$posts_page_id) ?><?php } ?>" 
      style="background-image: url('<?php echo $imageMobile[0]; ?>'); 
              background-position: <?php the_sub_field('horz_align_mob',$posts_page_id) ?> <?php the_sub_field('vert_align_mob',$posts_page_id) ?>; 
              <?php if(get_sub_field('panel_type',$posts_page_id) == 'fixed' && get_sub_field('panel_height',$posts_page_id)) { ?>min-height:<?php the_sub_field('panel_height',$posts_page_id) ?>px;<?php } ?>" 
      data-showDate="<?php the_sub_field('show_date',$posts_page_id) ?>" 
      data-hideDate="<?php the_sub_field('hide_date',$posts_page_id) ?>"
    >

    <?php } else {

      // Get background images
      $img_id_desk = get_sub_field('bg_desk',$posts_page_id);
      $size = 'large';
      $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

      <div 
        id="hero" 
        class="col-12 heroPanel 
                <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
                <?php if( get_sub_field('custom_class',$posts_page_id) ) { ?> <?php the_sub_field('custom_class',$posts_page_id) ?><?php } ?>" 
        style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
                background-position: <?php the_sub_field('horz_align_desk',$posts_page_id) ?> <?php the_sub_field('vert_align_desk',$posts_page_id) ?>; 
                <?php if(get_sub_field('panel_type',$posts_page_id) == 'fixed' && get_sub_field('panel_height',$posts_page_id)) { ?>min-height:<?php the_sub_field('panel_height',$posts_page_id) ?>px;<?php } ?>" 
        data-showDate="<?php the_sub_field('show_date',$posts_page_id) ?>" 
        data-hideDate="<?php the_sub_field('hide_date',$posts_page_id) ?>"
      >

    <?php }
  } else {

    // Get background images
    $img_id_desk = get_sub_field('bg_desk',$posts_page_id);
    $size = 'large';
    $imageDesk = wp_get_attachment_image_src( $img_id_desk, $size ); ?>

    <div 
      id="hero" 
      class="col-12 heroPanel 
              <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
              <?php if( get_sub_field('custom_class',$posts_page_id) ) { ?> <?php the_sub_field('custom_class',$posts_page_id) ?><?php } ?>" 
      style="background-image: url('<?php echo $imageDesk[0]; ?>'); 
              background-position: <?php the_sub_field('horz_align_desk',$posts_page_id) ?> <?php the_sub_field('vert_align_desk',$posts_page_id) ?>; 
              <?php if(get_sub_field('panel_type',$posts_page_id) == 'fixed' && get_sub_field('panel_height',$posts_page_id)) { ?>min-height:<?php the_sub_field('panel_height',$posts_page_id) ?>px;<?php } ?>" 
      data-showDate="<?php the_sub_field('show_date',$posts_page_id) ?>" 
      data-hideDate="<?php the_sub_field('hide_date',$posts_page_id) ?>"
    >

  <?php }
    
} elseif( get_sub_field('bg_type',$posts_page_id) == 'video' ) { ?>
  
  <div 
    id="hero" 
    class="col-12 heroPanel 
            <?php if(get_sub_field('panel_type') == 'fixed') { ?>fixed<?php } ?>
            <?php if( get_sub_field('custom_class',$posts_page_id) ) { ?> <?php the_sub_field('custom_class',$posts_page_id) ?><?php } ?>" 
    <?php if(get_sub_field('panel_type',$posts_page_id) == 'fixed' && get_sub_field('panel_height',$posts_page_id)) { ?>style="min-height:<?php the_sub_field('panel_height',$posts_page_id) ?>px;"<?php } ?> 
    data-showDate="<?php the_sub_field('show_date',$posts_page_id) ?>" 
    data-hideDate="<?php the_sub_field('hide_date',$posts_page_id) ?>"
  >

    <div class="feature-video-responsive">
      <?php if( get_sub_field('mp4_mobile_vid',$posts_page_id) || get_sub_field('webm_mobile_vid',$posts_page_id) ) { ?>
        <video id="video" class="mobileVid" preload="auto" playsinline muted="true" loop autoplay>
          <source src="<?php the_sub_field('webm_mobile_vid',$posts_page_id) ?>" type="video/webm">
          <source src="<?php the_sub_field('mp4_mobile_vid',$posts_page_id) ?>" type="video/mp4">
        </video>
        <video id="video" class="desktopVid" preload="auto" playsinline muted="true" loop autoplay>
          <source src="<?php the_sub_field('webm_desk_vid',$posts_page_id) ?>" type="video/webm">
          <source src="<?php the_sub_field('mp4_desk_vid',$posts_page_id) ?>" type="video/mp4">
        </video>
      <?php } else { ?>
        <div class="video-responsive">
          <video id="video" preload="auto" playsinline muted="true" loop autoplay>
            <source src="<?php the_sub_field('webm_desk_vid',$posts_page_id) ?>" type="video/webm">
            <source src="<?php the_sub_field('mp4_desk_vid',$posts_page_id) ?>" type="video/mp4">
          </video>
        </div>
      <?php } ?>
    </div>
    
<?php } ?>

  <?php if( wp_is_mobile() ) { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_mob',$posts_page_id) ?>);"<?php } ?>></div>
  <?php } else { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity_desk',$posts_page_id) ?>);"<?php } ?>></div>
  <?php } ?>

  <div class="heroContent row justify-content-center <?php the_sub_field('panel_type',$posts_page_id) ?>">
    <div class="col-12 col-xl-11">
      <div class="row <?php the_sub_field('alignment',$posts_page_id) ?>" style="height:100%;">
        <div class="col-12 p-0" <?php if(get_sub_field('panel_width',$posts_page_id)) { ?>style="max-width:<?php the_sub_field('panel_width',$posts_page_id) ?>px;"<?php } ?>>
          <div class="row <?php the_sub_field('alignment_vert',$posts_page_id) ?> <?php the_sub_field('alignment',$posts_page_id) ?>" style="height:100%;color:<?php the_sub_field('text_color',$posts_page_id) ?>;">
            
            <?php $totalrows = count( get_sub_field('content',$posts_page_id) ); ?>
            
            <?php if( have_rows('content',$posts_page_id) ): $rownum = 1; while( have_rows('content',$posts_page_id) ) : the_row(); ?>

              <?php if( $totalrows == 1 ) { ?>
                <div class="heroText col-12 num<?php echo $rownum; ?> <?php the_sub_field('alignment',$posts_page_id) ?>">
              <?php } elseif( $totalrows == 2 ) { ?>
                <div class="heroText col-12 col-lg-5 num<?php echo $rownum; ?> <?php the_sub_field('alignment',$posts_page_id) ?>">
              <?php } ?>

                <?php if( get_sub_field('content',$posts_page_id) ) { ?>
                  <div class="content">
                    <?php the_sub_field('content',$posts_page_id) ?>
                  </div>
                <?php } ?>

                <div class="button">

                <?php if( have_rows('buttons',$posts_page_id) ) {

                  while( have_rows('buttons',$posts_page_id) ) : the_row();

                    $link = get_sub_field('link',$posts_page_id);
                    if( $link ) {
                      $link_url = $link['url'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                    } ?>

                      <?php if( get_sub_field('text',$posts_page_id) && get_sub_field('link',$posts_page_id) ) { ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-<?php the_sub_field('style',$posts_page_id) ?> <?php the_sub_field('color',$posts_page_id) ?>"><?php the_sub_field('text',$posts_page_id) ?></a>
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
if( get_sub_field('hero_type',$posts_page_id) == 'full' ) { ?>
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
          <?php the_sub_field('hero_type',$posts_page_id) ?> 
          <?php if(get_sub_field('hero_type',$posts_page_id) == 'fixed') { ?>fixed<?php } ?>
          <?php the_sub_field('custom_class',$posts_page_id) ?>" 
  <?php if(get_sub_field('hero_type',$posts_page_id) == 'fixed' && get_sub_field('panel_height',$posts_page_id)) { ?>style="min-height:<?php the_sub_field('panel_height',$posts_page_id) ?>px;"<?php } ?> 
  data-showDate="<?php the_sub_field('show_date',$posts_page_id) ?>" 
  data-hideDate="<?php the_sub_field('hide_date',$posts_page_id) ?>"
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

  <?php while ( have_rows('hero_slides',$posts_page_id) ) : the_row(); 
  
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
        if( get_sub_field('mob_bg_img',$posts_page_id) ) { ?>
          <div 
            id="slideWrap" 
            class="col-12 p-0 imageSlide" 
            style="background-image:url('<?php echo $mobImage[0]; ?>'); 
                    background-position: <?php the_sub_field('horz_align_mob',$posts_page_id) ?> <?php the_sub_field('vert_align_mob',$posts_page_id) ?>;"
          >
        <?php } else { ?>
          <div 
            id="slideWrap" 
            class="col-12 p-0 imageSlide" 
            style="background-image:url('<?php echo $deskImage[0]; ?>'); 
                    background-position: <?php the_sub_field('horz_align_desk',$posts_page_id) ?> <?php the_sub_field('vert_align_desk',$posts_page_id) ?>;"
          >
        <?php } ?>
      <?php } else { ?>
        <div 
          id="slideWrap" 
          class="col-12 p-0 imageSlide" 
          style="background-image:url('<?php echo $deskImage[0]; ?>'); 
                  background-position: <?php the_sub_field('horz_align_desk',$posts_page_id) ?> <?php the_sub_field('vert_align_desk',$posts_page_id) ?>;"
        >
      <?php } ?>

    <?php } elseif( get_sub_field('slide_type',$posts_page_id) == 'video' ) { ?>
      
      <div id="slideWrap" class="col-12 p-0 videoSlide">
        <div class="video-responsive">
          <?php if( get_sub_field('mp4_mob_vid',$posts_page_id) || get_sub_field('webm_mob_vid',$posts_page_id) ) { ?>
            <video id="video" class="mobileVid" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_mob_vid',$posts_page_id) ?>" type="video/webm">
              <source src="<?php the_sub_field('mp4_mob_vid',$posts_page_id) ?>" type="video/mp4">
            </video>
            <video id="video" class="desktopVid" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_desk_vid',$posts_page_id) ?>" type="video/webm" >  
              <source src="<?php the_sub_field('mp4_desk_vid',$posts_page_id) ?>" type="video/mp4" >
            </video>
          <?php } else { ?>
            <video id="video" autoplay preload="true" volume="0" playsinline onloadedmetadata="this.muted = true">
              <source src="<?php the_sub_field('webm_desk_vid',$posts_page_id) ?>" type="video/webm">
              <source src="<?php the_sub_field('mp4_desk_vid',$posts_page_id) ?>" type="video/mp4">
            </video>
          <?php } ?>
        </div>

    <?php } ?>

      <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_sub_field('overlay_opacity',$posts_page_id) ?>);"<?php } ?>></div>

      <div class="heroContent row align-items-center justify-content-center">
        <div class="col-12 col-lg-11">
          <div class="row align-items-center <?php the_sub_field('alignment',$posts_page_id) ?>">
            <div class="col-12" <?php if(get_sub_field('content_width',$posts_page_id)) { ?>style="max-width:<?php the_sub_field('content_width',$posts_page_id) ?>px;"<?php } ?>>
              <div class="row">

                <?php $totalrows = count( get_sub_field('content',$posts_page_id) ); ?>
            
                <?php if( have_rows('content',$posts_page_id) ): $rownum = 1; while( have_rows('content',$posts_page_id) ) : the_row(); ?>  
          
                  <?php if( $totalrows == 1 ) { ?>
                    <div class="col-12 num<?php echo $rownum; ?>">
                  <?php } elseif( $totalrows == 2 ) { ?>
                    <div class="col-12 col-lg-6 num<?php echo $rownum; ?>">
                  <?php } ?>

                    <?php if( get_sub_field('content',$posts_page_id) ) { ?>
                      <div class="heroText"><?php the_sub_field('content',$posts_page_id) ?></div>
                    <?php } ?>

                    <div class="heroBtns <?php the_sub_field('button_alignment',$posts_page_id) ?>">

                    <?php if( have_rows('buttons',$posts_page_id) ) {

                        while( have_rows('buttons',$posts_page_id) ) : the_row();

                          $link = get_sub_field('link',$posts_page_id);
                          if( $link ) {
                            $link_url = $link['url'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          } ?>

                          <a href="<?php the_sub_field('link',$posts_page_id) ?>" class="btn btn-<?php the_sub_field('type',$posts_page_id) ?> <?php the_sub_field('color',$posts_page_id) ?>"><?php the_sub_field('text',$posts_page_id) ?></a>

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