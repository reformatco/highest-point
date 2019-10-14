<?php

/*
  Setup keys, if you add them will enqueue styles/scripts
  **************************************************************/

$package = array(
  'dir' => "dist", /* build = dev, dist = live */
  'ver' => date('Ymdhis'),
  'namespace' => 'highestpoint',
  'gmap_key' => "", // need to create at Google API Console
  'google_fonts' => 'Open+Sans:300,400,700',
  'typekit' => '',
  'sharethis' => '' // 5c5869a183748d0011314d53
);

if( preg_match('/local/',$_SERVER['HTTP_HOST']) ):
	$package['dir'] = 'build';
endif;

/*
  General Housekeeping
  **************************************************************/

$style_path = esc_url( get_template_directory_uri() )."/".$package['dir']."css/main.css";

function theme_setup() {
  global $style_path, $package;

  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-relative-urls');
  add_theme_support('soil-js-to-footer');


  add_theme_support('title-tag');

  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', $package['namespace']),
    'resources_navigation' => __('Resources Navigation', $package['namespace']),
    'footer_navigation' => __('Footer Navigation', $package['namespace'])
  ]);

  register_sidebar(array(
    'name' => 'Footer Widgets',
    'id'            => 'footer-widget',
    'before_widget' => '<section class = "widget">',
    'after_widget' => '</section>',
    'before_title' => '<header><h3>',
    'after_title' => '</h3></header>',
  ) );

  add_theme_support('post-thumbnails');

  add_image_size('wide', 1400, 450, true);
  add_image_size('fullhd', 1400, 9999, false);
  add_image_size('square', 900, 900, true);
  add_image_size('artist', 736, 450, true);
  add_image_size('logo', 300, 9999, false);

  add_filter( 'jpeg_quality', create_function( '', 'return 92;' ) );

  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  add_theme_support( 'custom-logo', array(
    'height'      => 160,
    'width'       => 160,
    'flex-width'  => true,
    'flex-height' => true,
    'header-text' => array( 'site-title', 'site-description' )
  ) );


}

/*
  ACF Setup
  **************************************************************/

function acf_setup(){

  $option_panels = array('Modules','Social','Misc');

  acf_add_options_page();
  foreach( $option_panels as $panel ):
    acf_add_options_sub_page( $panel );
  endforeach;

}

/*
  Init Theme
  **************************************************************/

function init_theme(){
  theme_setup();

  if( function_exists('acf_add_local_field_group') ) {
    acf_setup();
  }

}

add_action('after_setup_theme', 'init_theme');


function reformat_add_editor_styles() {
  global $package;

  remove_editor_styles();
  add_editor_style( 'editor-style.css' );

  if( $package['google_fonts'] ):
    add_editor_style( "https://fonts.googleapis.com/css?family=".$package['google_fonts']);
  endif;

}
add_action( 'admin_init', 'reformat_add_editor_styles' );

/*
  Additional Functions
  **************************************************************/

function custom_youtube_settings($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
    $return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
    return $return;
  }
  return $code;
}

add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');
add_filter('oembed_result', 'custom_youtube_settings');



/*
  Enqueue Scripts and Styles
  **************************************************************/

function theme_styles() {
  global $package;

  wp_deregister_style( 'wp-block-library' );

  if( $package['google_fonts'] ):
    wp_enqueue_style( 'gfonts', "https://fonts.googleapis.com/css?family=".$package['google_fonts'], null, null, 'all' );
  endif;

  if( $package['typekit'] ):
    wp_enqueue_style( 'typekit', "https://use.typekit.net/".$package['typekit'].".css", null, null, 'all' );
  endif;

  wp_enqueue_style( 'styles', esc_url( get_template_directory_uri() )."/".$package['dir']."/css/main.css", false, $package['ver'], false );
}

function theme_js() {

  global $wp_scripts, $package;

  if( $package['sharethis'] && get_post_type() == 'post' ):
    wp_enqueue_script('sharethis', "//platform-api.sharethis.com/js/sharethis.js#property=".$package['sharethis']."&product=custom-share-buttons", false, null, false);
  endif;

  wp_enqueue_script('main', esc_url( get_template_directory_uri() )."/".$package['dir']."/js/main.js", array('jquery'), $package['ver'], true);

}

if( !is_admin() && 'wp-login.php' != $pagenow ){

  add_action( 'wp_enqueue_scripts', 'theme_styles' );
  add_action( 'wp_enqueue_scripts', 'theme_js' );

}

include "inc/widgets/widget.logos.php";

// new Gutenberg blocks

/*

if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'        => 'expertise',
    'title'       => __('Expertise'),
    'description'   => __('A custom expertise block.'),
    'render_callback' => 'my_expertise_block_html'
  ));
}

function my_expertise_block_html() {

  $photo = get_field('photo');

  ?>
  <div class="expertise-item">
    <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
    <h2><?php the_field('title'); ?></h2>
    <?php the_field('text'); ?>
  </div>
  <?php
}


*/
