<?php

/* Hero Content
----------------------------------------------------------------------------------------------------------------------------------*/

// Get overlay color
$featPanel_hex_color = get_field('overlay_color','option');
$featPanel_RGB_color = hex2rgb($featPanel_hex_color);
$featPanel_overlay_color = implode(",", $featPanel_RGB_color); ?>

<div 
  id="hero" 
  class="col-12 heroPanel 
          <?php if(get_sub_field('panel_type','option') == 'fixed') { ?>fixed<?php } ?>
          <?php if( get_field('custom_class','option') ) { ?> <?php the_field('custom_class','option') ?><?php } ?>" 
  style="background-image: url('<?php the_post_thumbnail_url('large') ?>'); 
          <?php if(get_field('panel_type','option') == 'fixed' && get_sub_field('panel_height','option')) { ?>min-height:<?php the_field('panel_height','option') ?>px;<?php } ?>"
>

  <?php if( wp_is_mobile() ) { ?>
  <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_field('overlay_opacity_mob','option') ?>);"<?php } ?>></div>
  <?php } else { ?>
    <div class="overlay" <?php if($featPanel_hex_color) { ?>style="background: rgba(<?php echo $featPanel_overlay_color ?>,<?php the_field('overlay_opacity_desk','option') ?>);"<?php } ?>></div>
  <?php } ?>

  <div class="heroContent row justify-content-center <?php the_field('panel_type','option') ?>">
    <div class="col-12 col-xl-11">
      <div class="row <?php the_field('alignment','option') ?>" style="height:100%;">
        <div class="col-12 p-0" <?php if(get_field('panel_width','option')) { ?>style="max-width:<?php the_field('panel_width','option') ?>px;"<?php } ?>>
          <div class="row <?php the_field('alignment_vert','option') ?> <?php the_field('alignment','option') ?>" style="height:100%;color:<?php the_field('text_color','option') ?>;">

              <div class="heroText col-12 num<?php echo $rownum; ?> <?php the_field('alignment','option') ?>">

                <div class="content">
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <h5>By <?php the_author(); ?><br />
                    <?php the_time( 'F j, Y'); ?></h5>
                  <?php endwhile; endif; ?>
                </div>

              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>