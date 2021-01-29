<?php // Head Content ?>

<head profile="http://gmpg.org/xfn/11">

  

  <meta id="viewport" name="viewport" content="width=device-width">

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>



  <?php wp_enqueue_script("jquery"); ?>



  <?php // CODEMAY Google Conversion Tracking Codes
    $postID = get_the_ID();

    if( get_field('google_conversion_id',$postID) ) {
      $conversionId = get_field('google_conversion_id',$postID);
    } elseif( get_field('google_conversion_id','option') ) {
      $conversionId = get_field('google_conversion_id','option');
    }

    if( get_field('google_conversion_label',$postID) ) {
      $conversionLabel = get_field('google_conversion_label',$postID);
    } elseif( get_field('google_conversion_label','option') ) {
      $conversionLabel = get_field('google_conversion_label','option');
    }

    if( $conversionId && $conversionLabel ) { ?>

      <!-- CODEMAY Google Conversion Tracking Codes -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=AW-<?php echo $conversionId; ?>"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-<?php echo $conversionId; ?>');
      </script>
      <script>
      function gtag_report_conversion(url) {
        var callback = function () {
          if (typeof(url) != 'undefined') {
            window.location = url;
          }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-<?php echo $conversionId; ?>/<?php echo $conversionLabel; ?>',
            'event_callback': callback
        });
        return false;
      }
      </script>

    <?php } 
  // END CODEMAY Google Conversion Tracking Codes ?>



  <?php // Head Area Embed
    if( get_field('head_area_embed',$postID) ) {
      $headEmbed = get_field('head_area_embed',$postID);
    } elseif( get_field('head_area_embed','option') ) {
      $headEmbed = get_field('head_area_embed','option');
    } ?>

    <?php if( $headEmbed ) { ?>
      
      <!-- Head Area Emedded Code -->
      
        <?php echo $headEmbed; ?>
      
      <!-- END Head Area Emedded Code -->

    <?php } ?>

    <link rel="stylesheet" href="https://use.typekit.net/rvk5oxo.css">

  <?php wp_head(); ?>

  <?php locate_template('parts/animations-css.php', true); ?>
</head>