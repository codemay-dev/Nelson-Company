<?php
/*
CODEMAY Color Styles
*/

// Get default top bar colors
if( get_field('default_top_bar_bg','option') ) {
  $defaultTopBg_hex_color = get_field('default_top_bar_bg','option');
  $defaultTopBg_RGB_color = hex2rgb($defaultTopBg_hex_color);
  $defaultTopBg = implode(",", $defaultTopBg_RGB_color);
}
$defaultTopText = get_field('default_top_bar_text','option');

// Get scroll top bar colors
$scrollTopBg_hex_color = get_field('scroll_top_bar_bg','option');
$scrollTopBg_RGB_color = hex2rgb($scrollTopBg_hex_color);
$scrollTopBg = implode(",", $scrollTopBg_RGB_color);

$scrollTopText = get_field('scroll_top_bar_text','option');

// Menu default colors
$defaultMenuColor = get_field('menu_default_color','option');
$defaultMenuHover = get_field('menu_default_hover_color','option');
$defaultMenuBorder = get_field('menu_default_border_color','option');

// Menu scroll colors
$scrollMenuColor = get_field('menu_scroll_color','option');
$scrollMenuHover = get_field('menu_scroll_hover_color','option');
$scrollMenuBorder = get_field('menu_scroll_border_color','option');

//Mobile menu colors
$defaultMobileBg_hex_color = get_field('menu_mobile_bg','option');
$defaultMobileBg_RGB_color = hex2rgb($defaultMobileBg_hex_color);
$defaultMobileBg = implode(",", $defaultMobileBg_RGB_color);
$defaultMobileText = get_field('menu_mobile_default_text','option');
$hoverMobileText = get_field('menu_mobile_hover_text','option');
$activeMobileText = get_field('menu_mobile_active_text','option');

// Get link colors
$linkColor = get_field('link_color','option');
$linkHover = get_field('link_hover','option');

// Get button colors
$darkColor = get_field('dark_btn_bg','option');
$darkHover = get_field('dark_btn_hover','option');
$lightColor = get_field('light_btn_bg','option');
$lightHover = get_field('light_btn_hover','option');

// Get header colors
$heroHeaders = get_field('hero_headers','option');
$contentPanelHeaders = get_field('content_panel_headers','option');
$footerHeaders = get_field('footer_headers','option');

// Get border colors
$borderColor = get_field('border_color','option');
$borderFocus = get_field('border_focus','option');

// Border Radius
$borderRadius = get_field('border_radius','option');

// Box Shadow Color
$boxShadow = get_field('box_shadow_color','option');

// Text Shadow
$textShadow = get_field('text_shadow_color','option');

?>

<style>



/*** Top Bar
----------------------------------------------------------------------------------------------------------------------------------*/
<?php if( get_field('default_top_bar_bg','option') ) { ?>
  #topBar {
    background: rgba(<?php echo $defaultTopBg ?>,0.9);
  }
<?php } ?>

#topBar.scrollOn {
  background: rgba(<?php echo $scrollTopBg ?>,0.9);
}



/*** Menu
----------------------------------------------------------------------------------------------------------------------------------*/
@media(min-width:1200px) {
  #topBar .navbar-nav .nav-link {
    color: <?php echo $defaultMenuColor ?>;
  }
  #topBar.scrollOn .navbar-nav .nav-link {
    color: <?php echo $scrollMenuColor ?>;
  }

  #topBar .navbar-nav .nav-link:hover {
    color: <?php echo $defaultMenuHover ?>;
  }
  #topBar.scrollOn .navbar-nav .nav-link:hover {
    color: <?php echo $scrollMenuHover ?>;
  }

  #topBar .navbar-nav > li.active > .nav-link {
    border-color: <?php echo $defaultMenuHover ?>;
    color: <?php echo $defaultMenuHover ?>;
  }
  #topBar.scrollOn .navbar-nav > li.active > .nav-link {
    border-color: <?php echo $scrollMenuHover ?>;
    color: <?php echo $scrollMenuHover ?>;
  }

  #topBar .navbar-nav > li.active > .nav-link:hover {
    border-color: <?php echo $defaultMenuHover ?>;
  }
  #topBar.scrollOn .navbar-nav > li.active .nav-link:hover {
    border-color: <?php echo $scrollMenuHover ?>;
  }

  #topBar .navbar-nav .dropdown-menu {
    background: none;
  }
  #topBar.scrollOn .navbar-nav .dropdown-menu {
    background: rgba(<?php echo $scrollTopBg ?>,0.9);
  }

  #topBar .dropdown-item {
    color: <?php echo $defaultMenuColor ?>;
  }
  #topBar.scrollOn .dropdown-item {
    color: <?php echo $scrollMenuColor ?>;
  }
  #topBar .dropdown-item:hover {
    color: <?php echo $defaultMenuHover ?>;
  }
  #topBar.scrollOn .dropdown-item:hover {
    color: <?php echo $scrollMenuHover ?>;
  }

  #topBar .dropdown-item.active {
    color: <?php echo $defaultMenuColor ?>;
    border-color: <?php echo $defaultMenuColor ?>;
  }
  #topBar.scrollOn .dropdown-item.active {
    color: <?php echo $scrollMenuColor ?>;
    border-color: <?php echo $scrollMenuColor ?>;
  }
  #topBar .dropdown-item.active:hover {
    color: <?php echo $defaultMenuHover ?>;
    border-color: <?php echo $defaultMenuHover ?>;
  }
  #topBar.scrollOn .dropdown-item.active:hover {
    color: <?php echo $scrollMenuHover ?>;
    border-color: <?php echo $scrollMenuHover ?>;
  }
}

@media(max-width:1199.98px) {
  #topBar .navbar-toggler span {
    background: <?php echo $defaultMenuText ?>;
  }
  #topBar.scrollOn .navbar-toggler span {
    background: <?php echo $scrollTopText ?>;
  }

  #topBar .navbar-toggler.close span {
    background: <?php echo $defaultMobileText ?>;
  }

  #topBar .navbar-collapse {
    background: rgba(<?php echo $defaultMobileBg ?>,1);
  }

  #topBar .nav-link {
    border-color: <?php echo $defaultMobileText ?>;
    color: <?php echo $defaultMobileText ?>;
  }
  #topBar .nav-link:hover {
    border-color: <?php echo $hoverMobileText ?>;
    color: <?php echo $hoverMobileText ?>;
  }

  #topBar .navbar-nav > li.active > .nav-link {
    border-color: <?php echo $activeMobileText ?>;
    color: <?php echo $activeMobileText ?>;
  }

  #topBar .dropdown-item {
    border-color: <?php echo $defaultMobileText ?>;
    color: <?php echo $defaultMobileText ?>;
  }
  #topBar .dropdown-item:hover {
    border-color: <?php echo $hoverMobileText ?>;
    color: <?php echo $hoverMobileText ?>;
  }

  #topBar .dropdown-item.active {
    border-color: <?php echo $activeMobileText ?>;
    color: <?php echo $activeMobileText ?>;
  }
  #topBar .dropdown-item.active:hover {
    border-color: <?php echo $activeMobileText ?>;
    color: <?php echo $activeMobileText ?>;
  }
}



/*** Links
----------------------------------------------------------------------------------------------------------------------------------*/
a {
  color: <?php echo $linkColor ?>;
}
a:hover {
  color: <?php echo $linkHover ?>;
}



/*** All Buttons
----------------------------------------------------------------------------------------------------------------------------------*/
.btn,
a.btn,
a.button,
input.button {
  <?php if( get_field('border_buttons','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
}



/*** Solid Buttons
----------------------------------------------------------------------------------------------------------------------------------*/

/* Dark */
.btn-solid,
.btn-solid.dark,
a.btn-solid:not([href]):not([tabindex]),
a.btn-solid.dark:not([href]):not([tabindex]) {
  background: <?php echo $darkColor ?>;
  border-color: <?php echo $darkColor ?>;
  color: <?php echo $darkHover ?>;
}
.btn-solid:hover,
.btn-solid.dark:hover,
a.btn-solid:hover:not([href]):not([tabindex]),
a.btn-solid.dark:hover:not([href]):not([tabindex]) {
  background: transparent;
  border-color: <?php echo $darkColor ?>;
  color: <?php echo $darkColor ?>;
}

/* Light */
.btn-solid.light,
a.btn-solid.light:not([href]):not([tabindex]) {
  background: <?php echo $lightColor ?>;
  border-color: <?php echo $lightColor ?>;
  color: <?php echo $lightHover ?>;
}
.btn-solid.light:hover,
a.btn-solid.light:hover:not([href]):not([tabindex]) {
  background: transparent;
  border-color: <?php echo $lightColor ?>;
  color: <?php echo $lightColor ?>;
}



/*** Hollow Buttons
----------------------------------------------------------------------------------------------------------------------------------*/

/* Dark */
.btn-hollow,
a.button,
input.button,
.btn-hollow.dark,
a.btn-hollow:not([href]):not([tabindex]),
a.btn-hollow.dark:not([href]):not([tabindex]) {
  background: transparent;
  border-color: <?php echo $darkColor ?>;
  color: <?php echo $darkColor ?>;
}
.btn-hollow:hover,
a.button:hover,
input.button:hover,
.btn-hollow.dark:hover,
a.btn-hollow:hover:not([href]):not([tabindex]),
a.btn-hollow.dark:hover:not([href]):not([tabindex]) {
  background: <?php echo $darkColor ?>;
  border-color: <?php echo $darkColor ?>;
  color: <?php echo $darkHover ?>;
}

/* Light */
.btn-hollow.light,
a.btn-hollow.light:not([href]):not([tabindex]) {
  background: transparent;
  border-color: <?php echo $lightColor ?>;
  color: <?php echo $lightColor ?>;
}
.btn-hollow.light:hover,
a.btn-hollow.light:hover:not([href]):not([tabindex]) {
  background: <?php echo $lightColor ?>;
  border-color: <?php echo $lightColor ?>;
  color: <?php echo $lightHover ?>;
}



/*** Headers
----------------------------------------------------------------------------------------------------------------------------------*/

/* Hero Headers */
#hero h1,
#hero h2,
#hero h3,
#hero h4,
#hero h5,
#hero h6 {
  color: <?php echo $heroHeaders ?>;
}

/* Content Panel Headers */
.contentPanel .contentImage h1,
.contentPanel .contentContent h1,
.contentPanel .contentSidebar h1,

.contentPanel .contentImage h2,
.contentPanel .contentContent h2,
.contentPanel .contentSidebar h2,

.contentPanel .contentImage h3,
.contentPanel .contentContent h3,
.contentPanel .contentSidebar h3,

.contentPanel .contentImage h4,
.contentPanel .contentContent h4,
.contentPanel .contentSidebar h4,

.contentPanel .contentImage h5,
.contentPanel .contentContent h5,
.contentPanel .contentSidebar h5,

.contentPanel .contentImage h6,
.contentPanel .contentContent h6,
.contentPanel .contentSidebar h6 {
  color: <?php echo $contentPanelHeaders ?>;
}

/* Footer Panel Headers */
#footerPanels h1,
#footerPanels h2,
#footerPanels h3,
#footerPanels h4,
#footerPanels h5,
#footerPanels h6 {
  color: <?php echo $footerHeaders ?>;
}



/*** Borders
----------------------------------------------------------------------------------------------------------------------------------*/

/* Form Fields */
input[type="text"],
input[type="email"],
input[type="number"],
input[type="tel"],
input[type="password"] {
  <?php if( get_field('border_forms','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
  border-color: <?php echo $borderColor ?>;
  color: <?php echo $borderColor ?>;
}

textarea.form-control {
  <?php if( get_field('border_forms','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
  border-color: <?php echo $borderColor ?>;
  color: <?php echo $borderColor ?>;
}

select,
.select2-container--default .select2-selection--single,
.select2-dropdown {
  <?php if( get_field('border_forms','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
  border-color: <?php echo $borderColor ?>;
  color: <?php echo $borderColor ?>;
}

input#zip {
  <?php if( get_field('border_forms','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
  border-color: <?php echo $borderColor ?>;
  color: <?php echo $borderColor ?>;
}

#studio_list {
  <?php if( get_field('border_forms','option') == true ) { ?>
    border-radius: <?php echo $borderRadius ?>px;
  <?php } ?>
  border-color: <?php echo $borderColor ?>;
  color: <?php echo $borderColor ?>;
}

/* Placeholder */
input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="number"]::placeholder,
input[type="tel"]::placeholder,
input[type="password"]::placeholder,
textarea::placeholder {
  color: <?php echo $borderColor ?>;
}

/* Focus */
input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="password"]:focus,
textarea.form-control:focus {
  border-color: <?php echo $borderFocus ?>;
}

input#zip::placeholder {
  color: <?php echo $borderColor ?>;
}
input#zip:focus {
  border-color: <?php echo $borderFocus ?>;
}



/*** Box Shadow
----------------------------------------------------------------------------------------------------------------------------------*/
<?php if( get_field('shadow_content_images','option') == true ) { ?>

  .contentImage img,
  .contentContent img {
    box-shadow: 0px 0px 15px <?php echo $boxShadow ?>;
  }

<?php } ?>

<?php if( get_field('shadow_gallery_images','option') == true ) { ?>

  #galleryWrap img {
    box-shadow: 0px 0px 15px <?php echo $boxShadow ?>;
  }

<?php } ?>

<?php if( get_field('shadow_small_blocks','option') == true ) { ?>

  .block .box {
    box-shadow: 0px 0px 15px <?php echo $boxShadow ?>;
  }

<?php } ?>

<?php if( get_field('shadow_buttons','option') == true ) { ?>
  
  .btn {
    box-shadow: 0px 0px 15px <?php echo $boxShadow ?>;
  }

<?php } ?>



/*** Text Shadow
----------------------------------------------------------------------------------------------------------------------------------*/
<?php if( get_field('hero_panel_text','option') == true ) { ?>

  .heroText {
    text-shadow: 1px 1px 5px <?php echo $textShadow ?>;
  }

<?php } ?>

<?php if( get_field('footer_panel_text','option') == true ) { ?>

  .footText {
    text-shadow: 1px 1px 5px <?php echo $textShadow ?>;
  }

<?php } ?>

<?php if( get_field('feature_panels','option') == true ) { ?>

  .feature . content {
    text-shadow: 1px 1px 5px <?php echo $textShadow ?>;
  }

<?php } ?>

<?php if( get_field('feature_boxes','option') == true ) { ?>
  
  .featureBox .content {
    text-shadow: 1px 1px 5px <?php echo $textShadow ?>;
  }

<?php } ?>

</style>