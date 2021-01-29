<?php
/*
CODEMAY Animation Styles
*/

  if( wp_is_mobile() ) {

      /* Content Panels */
      if( get_field('content_panels_mobile_animation','option') == true ) { ?>

        <style>
          .contentContent .innerBox {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-30px);
          }
          .contentContent.scroll .innerBox,
          .contentContent.firstScroll .innerBox {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>
      
      <?php }



      /* Image Panels */
      if( get_field('image_panels_mobile_animation','option') == true ) { ?>

        <style>
          .contentImage .innerBox,
          .contentImage .innerImg {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,30px);
          }
          .contentImage.scroll .innerBox,
          .contentImage.firstScroll .innerBox,
          .contentImage.scroll .innerImg,
          .contentImage.firstScroll .innerImg {
            opacity: 1;
            transform: translate(0px,0px);
          }

          .full .contentImage .innerImg {
            transition: all 1s ease-out;
            opacity: 0;
            transform: scale(0.9);
          }
          .full .contentImage.scroll .innerImg,
          .full .contentImage.firstScroll .innerImg {
            opacity: 1;
            transform: scale(1);
          }
        </style>

      <?php }



      /* Feature Panel */
      if( get_field('feature_panels_mobile_animation','option') == true ) { ?>

        <style>
          .featurePanel .content {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-50px);
          }
          .featurePanel .button {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-30px);
          }
          .featurePanel .scroll .content,
          .featurePanel .firstScroll .content {
            opacity: 1;
            transform: translate(0px,0px);
          }
          .featurePanel .scroll .button,
          .featurePanel .firstScroll .button {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>

      <?php }



      /* Feature Boxes */
      if( get_field('feature_boxes_mobile_animation','option') == true ) { ?>

        <style>
          .featureBoxes .content {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-25px);
          }
          .featureBoxes .button {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-15px);
          }
          .featureBoxes .content.scroll,
          .featureBoxes .content.firstScroll {
            opacity: 1;
            transform: translate(0px,0px);
          }
          .featureBoxes .content.scroll .button,
          .featureBoxes .content.firstScroll .button {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>

      <?php }

  } else {

      /* Content Panels */
      if( get_field('content_panels_animation','option') == true ) { ?>

        <style>
          .contentContent .innerBox {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-30px);
          }
          .contentContent.scroll .innerBox,
          .contentContent.firstScroll .innerBox {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>

      <?php }



      /* Content/Image Panels */
      if( get_field('image_panels_animation','option') == true ) { ?>

        <style>
          .contentImage .innerBox {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-30px);
          }
          .contentImage.scroll .innerBox,
          .contentImage.firstScroll .innerBox {
            opacity: 1;
            transform: translate(0px,0px);
          }
          .contentImage .innerImg {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,30px);
          }
          .contentImage.scroll .innerImg,
          .contentImage.firstScroll .innerImg {
            opacity: 1;
            transform: translate(0px,0px);
          }

          .full .contentImage .innerImg {
            transition: all 1s ease-out;
            opacity: 0;
            transform: scale(0.9);
          }
          .full .contentImage.scroll .innerImg,
          .full .contentImage.firstScroll .innerImg {
            opacity: 1;
            transform: scale(1);
          }

          @media(max-width:767.98px) {
            .contentImage .innerBox {
              transform: translate(0px,30px);
            }
            .contentImage.scroll .innerBox,
            .contentImage.firstScroll .innerBox {
              transform: translate(0px,0px);
            }
            .contentImage .innerImg {
              transform: translate(0px,-30px);
            }
            .contentImage.scroll .innerImg,
            .contentImage.firstScroll .innerImg {
              transform: translate(0px,0px);
            }
          }
        </style>

      <?php }



      /* Feature Panel */
      if( get_field('feature_panels_animation','option') == true ) { ?>

        <style>
          .featurePanel .content {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-50px);
          }
          .featurePanel .button {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-30px);
          }
          .featurePanel .scroll .content,
          .featurePanel .firstScroll .content {
            opacity: 1;
            transform: translate(0px,0px);
          }
          .featurePanel .scroll .button,
          .featurePanel .firstScroll .button {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>

      <?php }



      /* Feature Boxes */
      if( get_field('feature_boxes_animation','option') == true ) { ?>

        <style>
          .featureBoxes .content {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-25px);
          }
          .featureBoxes .button {
            transition: all 1s ease-out;
            opacity: 0;
            transform: translate(0px,-15px);
          }
          .featureBoxes .content.scroll,
          .featureBoxes .content.firstScroll {
            opacity: 1;
            transform: translate(0px,0px);
          }
          .featureBoxes .content.scroll .button,
          .featureBoxes .content.firstScroll .button {
            opacity: 1;
            transform: translate(0px,0px);
          }
        </style>
        
      <?php }

  } 
  
?>