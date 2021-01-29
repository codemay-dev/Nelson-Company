<?php // Footer File

  locate_template('parts/footerpanels.php', true); ?>

    <footer class="row align-items-center justify-content-between">
      <div class="col-12 col-md-auto copyright">
        <ul>
          <li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
          <li>All Rights Reserved</li>
          <li><a href="<?php bloginfo('siteurl'); ?>/privacy-policy">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-auto siteby">
        <a href="https://codemay.com" target="_new">Site by <img src="<?php bloginfo('template_directory'); ?>/images/codemay-logo-black.png" /></a> 
      </div>
    </footer>
  </div> <!-- End Wrap -->

  <?php locate_template('script.php', true); ?>
  
  <?php if( is_page('find-a-certified-trainer-near-me') ) { ?>
    <script type="text/javascript" src="//cdn.storelocatorwidgets.com/widget/mapbox-gl.js"></script>
    <script type="text/javascript" id="storelocatorscript" data-uid="25c69a4203a347359016accf658a2097" data-platform="MapTiler" src="//cdn.storelocatorwidgets.com/widget/widget.js"></script>
  <?php } ?>

  <?php wp_footer(); ?>

  <?php // Footer Area Embed
    if( get_field('footer_area_embed',$postID) ) {
      $footerEmbed = get_field('footer_area_embed',$postID);
    } elseif( get_field('footer_area_embed','option') ) {
      $footerEmbed = get_field('footer_area_embed','option');
    } ?>

    <?php if( $footerEmbed ) { ?>

      <!-- Footer Area Emedded Code -->

        <?php echo $footerEmbed; ?>
      
      <!-- END Footer Area Emedded Code -->
    
    <?php } ?>

  <script type="text/javascript">
  
    const menucontent = document.querySelector(".navbar-collapse");
    const nomenuhere = document.querySelector(".navbar-toggler");

    menucontent.addEventListener("click", () => {nomenuhere.checked = false;});
  
  </script>
</body>
</html>
