<?php // Clicks Fonts



  /*** Arial
  --------------------------------------------------------------------------------------------------------------------------------*/
  
  // Headers & Buttons
  if( get_field('header_font','option') == 'arial' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: arial, sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'arial' ) { ?>
    <style>
      body {
        font-family: arial, sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }



  /*** Adieu
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'adieu' || get_field('body_font','option') == 'adieu' ) { ?>
    <link rel="stylesheet" href="<?php echo plugins_url( 'css/adieu.css', __FILE__ ) ?>" type="text/css" charset="utf-8" />
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'adieu' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Adieu';
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'adieu' ) { ?>
    <style>
      body {
        font-family: 'Adieu';
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }
  
  

  /*** Roboto
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'roboto' || get_field('body_font','option') == 'roboto' ) { ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'roboto' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Roboto', sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'roboto' ) { ?>
    <style>
      body {
        font-family: 'Roboto', sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }



  /*** Georgia
  --------------------------------------------------------------------------------------------------------------------------------*/

  // Headers & Buttons
  if( get_field('header_font','option') == 'georgia' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: georgia, serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'georgia' ) { ?>
    <style>
      body {
        font-family: georgia, serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }



  /*** Lato
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'lato' || get_field('body_font','option') == 'lato' ) { ?>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'lato' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Lato', sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'lato' ) { ?>
    <style>
      body {
        font-family: 'Lato', sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }



/*** Poppins
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'poppins' || get_field('body_font','option') == 'poppins' ) { ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700,700i&display=swap" rel="stylesheet">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'poppins' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'poppins' ) { ?>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
      }
    </style>
  <?php }



  /*** Monteserrat
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'montserrat' || get_field('body_font','option') == 'montserrat' ) { ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'montserrat' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Montserrat', sans-serif;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'montserrat' ) { ?>
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
      }
    </style>
  <?php }



  /*** Oswald
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'oswald' || get_field('body_font','option') == 'oswald' ) { ?>
    <link rel="stylesheet" href="https://use.typekit.net/slg0ept.css">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'oswald' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: oswald, sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'oswald' ) { ?>
    <style>
      body {
        font-family: oswald, sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 700 */
      }
    </style>
  <?php }



  /*** Fira Sans
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'fira' || get_field('body_font','option') == 'fira' ) { ?>
    <link rel="stylesheet" href="https://use.typekit.net/csf8jxn.css">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'fira' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: fira-sans, sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'fira' ) { ?>
    <style>
      body {
        font-family: fira-sans, sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 400 600 */
      }
    </style>
  <?php }
  


  /*** Proxima Nova
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'proxima' || get_field('body_font','option') == 'proxima' ) { ?>
    <link rel="stylesheet" href="https://use.typekit.net/zov2bsg.css">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'proxima' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: proxima-nova, sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'proxima' ) { ?>
    <style>
      body {
        font-family: proxima-nova, sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 300 500 700 */
      }
    </style>
  <?php }



  /*** Brandon Grotesque
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'brandon' || get_field('body_font','option') == 'brandon' ) { ?>
    <link rel="stylesheet" href="https://use.typekit.net/fyu3cxp.css">
  <?php }

  // Headers & Buttons
  if( get_field('header_font','option') == 'brandon' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: brandon-grotesque, sans-serif;
        font-weight: <?php the_field('header_font_weight','option'); ?>;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'brandon' ) { ?>
    <style>
      body {
        font-family: brandon-grotesque, sans-serif;
        font-weight: <?php the_field('body_font_weight','option'); ?>;
        /* 100 300 400 500 700 900 */
      }
    </style>
  <?php }



  /*** Venti CF
  --------------------------------------------------------------------------------------------------------------------------------*/
  if( get_field('header_font','option') == 'venti' || get_field('body_font','option') == 'venti' ) { ?>
    <link rel="stylesheet" href="<?php echo plugins_url( 'css/venti.css', __FILE__ ) ?>" type="text/css" charset="utf-8" />
  <?php }
  
  // Headers & Buttons
  if( get_field('header_font','option') == 'venti' ) { ?>
    <style>
      h1, h2, h3, h4, h5, h6,
      .btn,
      #countdownClock {
        font-family: 'Venti Demi Bold', sans-serif;
      }
    </style>
  <?php }

  // Body
  if( get_field('body_font','option') == 'venti' ) { ?>
    <style>
      body {
        font-family: 'Venti Medium', sans-serif;
      }
    </style>
  
  <?php } 
    
?>