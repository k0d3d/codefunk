<?php

  function codeFunkScriptStyles(){
    wp_enqueue_style('codefunk-css',  get_template_directory_uri() . '/assets/css/codefunk.css');
    wp_enqueue_script('codefunk-js',  get_template_directory_uri() . '/assets/js/codefunk.js', array( 'jquery' ));
    // wp_enqueue_script('bootstrap',  get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ));
    // Syntax Hightlighter
    wp_enqueue_style('prism-highlight-css',  get_template_directory_uri() . '/assets/css/prism/prism.css');
    wp_enqueue_style('prism-highlight-css',  get_template_directory_uri() . '/assets/css/prism/prism-okaidia.css');
    wp_enqueue_script('prism-highlight-js',  get_template_directory_uri() . '/assets/js/prism/prism.js');

    wp_enqueue_script('ace-editor-js',  get_template_directory_uri() . '/assets/js/ace/ace.js');
  }

  add_action('wp_enqueue_scripts', 'codeFunkScriptStyles');

  /**
 * Proper way to enqueue scripts and styles
 */
function load_bootswatch() {
  // wp_enqueue_style( 'bootswatch', get_template_directory_uri() . '/assets/css/bootstrap-bootswatch.min.css');
}

add_action( 'wp_enqueue_scripts', 'load_bootswatch' );