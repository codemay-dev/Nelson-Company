<?php // JavaScript Code ?>



<script>

  if (!document.getElementById("hero")) {
    $('body').addClass('noHero');
  }

  $(document).ready(function() {
    $('li.icons').replaceWith($('ul.icons').clone());
  })

  // Header Fade on Scroll
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if( scroll >= 1 ) {
      $('#topBar').addClass('scrollOn');
    } else {
      $('#topBar').removeClass('scrollOn');
    }
  });

  $(function(){ 
    var navMain = $('.navbar-collapse');
    navMain.on("click", "a:not([data-toggle])", null, function () {
      navMain.collapse('hide');
      $('.navbar-toggler').removeClass('close');
    });
  });



  $(document).ready(function() {
    // Testimonial Slider
    var slides = $('#testSlider').children().length;
    if(slides <= 1) {
        $('#testPrev, #testNext').css("display", "none");
    } else {
        $('#testPrev, #testNext').css("display", "visible");
    }
    $('#testSlider').on('cycle-initialized', function (e, opts, API) {});

    // Feature Slider
    var slides = $('#featSlider').children().length;
    if(slides <= 1) {
        $('#featPrev, #featNext').css("display", "none");
    } else {
        $('#featPrev, #featNext').css("display", "visible");
    }
    $('#featSlider').on('cycle-initialized', function (e, opts, API) {});
  });

  
/*
  $(document).ready(function() {
    $winHeight = window.innerHeight;
    $('.row.full').css('min-height',$winHeight);
  });
  $(window).resize(function() {
    $winHeight = window.innerHeight;
    $('.row.full').css('min-height',$winHeight);
  });
*/


  $(document).ready(function() {
    /*** Hero Fade ***/
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      
      // MOBILE
      <?php if( get_field('hero_panels_mobile','option') == true ) { ?>
        // Hero Panels
        $('.heroText').addClass('fade').delay(300).queue(function(next) {
          $(this).addClass('on');
          next();
        });
      <?php } else { ?>
        $('.heroText').addClass('noFade');
      <?php } ?>

    } else {

      // DESKTOP
      <?php if( get_field('hero_panels','option') == true ) { ?>
        // Hero Panels
        $('.heroText').addClass('fade').delay(300).queue(function(next) {
          $(this).addClass('on');
          next();
        });
      <?php } else { ?>
        $('.heroText').addClass('noFade');
      <?php } ?>

    }
  });
  
  $(window).load(function() {
    /*
    <?php if( get_field('content_panels_mobile','option') == true || get_field('content_panels','option') == true ) { ?>
      $('.contentContent').first().addClass('firstScroll');
    <?php } ?>
    
    <?php if( get_field('image_panels_mobile','option') == true || get_field('image_panels','option') == true ) { ?>
      $('.contentImage').first().addClass('firstScroll');
    <?php } ?>

    <?php if( get_field('feature_panels_mobile','option') == true || get_field('feature_panels','option') == true ) { ?>
      $('.feature').first().addClass('firstScroll');
    <?php } ?>

    <?php if( get_field('feature_boxes_mobile','option') == true || get_field('feature_boxes','option') == true ) { ?>
      $('.featureBoxes').first().addClass('firstScroll');
    <?php } ?>
    */
  });

  $(window).on('scroll', function() {

    /*** Scroll Fade ***/
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

      <?php if( get_field('content_panels_mobile','option') == true ) { ?>
        // Content Panels
        $('.contentContent .innerBox').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            //$(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('image_panels_mobile','option') == true ) { ?>
        // Content/Image Panels
        $('.contentImage innerBox, .contentImage .innerImg').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            //$(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('feature_panels_mobile','option') == true ) { ?>
        // Feature Panels
        $('.feature .content').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            //$(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('feature_boxes_mobile','option') == true ) { ?>
        // Feature Boxes
        $('.featureBoxes .content').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).addClass('scroll');
          } else {
            //$(this).removeClass('scroll');
          }
        });
      <?php } ?>

    } else {

      <?php if( get_field('content_panels','option') == true ) { ?>
        // Content Panels
        $('.contentContent .innerBox').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            $(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('image_panels','option') == true ) { ?>
        // Content/Image Panels
        $('.contentImage .innerBox, .contentImage .innerImg').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            $(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('feature_panels','option') == true ) { ?>
        // Feature Panels
        $('.feature .content').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).parent().addClass('scroll');
          } else {
            $(this).parent().removeClass('scroll');
          }
        });
      <?php } ?>

      <?php if( get_field('feature_boxes','option') == true ) { ?>
        // Feature Boxes
        $('.featureBoxes .content').each(function() {
          if (isScrolledIntoView($(this))) {
            $(this).addClass('scroll');
          } else {
            $(this).removeClass('scroll');
          }
        });
      <?php } ?>

    }

  });



  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top + 200;
    var elemHeight = $(elem).height() / 2;
    var elemBottom = elemTop + elemHeight;

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }



  $(document).ready(function () {

    // Mobile Menu Script
    $('.navbar-toggler').click(function() {
      $(this).toggleClass( 'close' );
    });

    // Scroll down one window height effect
    $('a[href="#scroll"]').click(function() {
      $winPosition = $(document).scrollTop();
      $winHeight = window.innerHeight;
        $('html, body').animate({
            scrollTop: $winPosition + $winHeight
        }, 300);
    });
    $('a[href="#SCROLL"]').click(function() {
        $('html, body').animate({
            scrollTop: $winPosition + $winHeight
        }, 300);
    });

    // iframe wrap for responsive videos
    $('iframe').each(function() {
      if (! $(this).parent().hasClass('vidWrap') ) {
        $(this).wrap('<div class="vidWrap"/>');
      }
    });
    jQuery('.vidWrap').fitVids();

  });




  $(document).ready(function () {
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd;
    } 
    if (mm < 10) {
      mm = '0' + mm;
    } 
    var today = mm + '-' + dd + '-' + yyyy;

    $('.fullPanel').each(function() {
      var showDate = $(this).data('showdate');
      var hideDate = $(this).data('hidedate');

      if(showDate !== '') {
        if (today == showDate) {
          $(this).removeClass('hideDate');
        } else if (today > showDate) {
          $(this).removeClass('hideDate');
        } else if (today < showDate) {
          $(this).addClass('hideDate');
        }
      } 
      if(hideDate !== '') {
        if (today == hideDate) {
          $(this).addClass('hideDate');
        } else if (today > hideDate) {
          $(this).addClass('hideDate');
        }
      }

    });
    
    $('.contentPanel').each(function() {
      var showDate = $(this).data('showdate');
      var hideDate = $(this).data('hidedate');
      
      if(showDate !== '') {
        if (today == showDate) {
          $(this).removeClass('hideDate');
        } else if (today > showDate) {
          $(this).removeClass('hideDate');
        } else if (today < showDate) {
          $(this).addClass('hideDate');
        }
      } 
      if(hideDate !== '') {
        if (today == hideDate) {
          $(this).addClass('hideDate');
        } else if (today > hideDate) {
          $(this).addClass('hideDate');
        }
      }

    });
    
    $('.featureBoxes').each(function() {
      var showDate = $(this).data('showdate');
      var hideDate = $(this).data('hidedate');

      if(showDate !== '') {
        if (today == showDate) {
          $(this).removeClass('hideDate');
        } else if (today > showDate) {
          $(this).removeClass('hideDate');
        } else if (today < showDate) {
          $(this).addClass('hideDate');
        }
      } 
      if(hideDate !== '') {
        if (today == hideDate) {
          $(this).addClass('hideDate');
        } else if (today > hideDate) {
          $(this).addClass('hideDate');
        }
      }

    });
    
  });
  
</script>