<?php

  function codeFunkScriptStyles(){
    $scriptVersion = '0.0.5';
    wp_enqueue_style('codefunk-css',  get_template_directory_uri() . '/assets/css/codefunk.css');
    wp_enqueue_script('codefunk-js',  get_template_directory_uri() . '/assets/js/codefunk.js', array( 'jquery' ));
    // wp_enqueue_script('bootstrap',  get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ));
    // Syntax Hightlighter Prism CSS
    // wp_enqueue_style('prism-highlight-doc',  get_template_directory_uri() . '/assets/css/prism/prism-style.css', array(), $scriptVersion, true);
    wp_enqueue_style('prism-highlight',  get_template_directory_uri() . '/assets/css/prism/prism.css');
    wp_enqueue_style('prism-highlight-okaidia',  get_template_directory_uri() . '/assets/css/prism/prism-okaidia.css');
    // wp_enqueue_style('prism-highlight-autolinker',  get_template_directory_uri() . '/assets/css/prism/prism-autolinker.css');
    // wp_enqueue_style('prism-highlight-line-highlight',  get_template_directory_uri() . '/assets/css/prism/prism-line-highlight.css');
    // wp_enqueue_style('prism-highlight-line-numbers',  get_template_directory_uri() . '/assets/css/prism/prism-line-numbers.css', array(), $scriptVersion, true);
    // wp_enqueue_style('prism-highlight-show-language',  get_template_directory_uri() . '/assets/css/prism/prism-show-language.min.css');

    //Syntax Highlighter Prism Jse-
    wp_enqueue_script('prism-highlight-js',  get_template_directory_uri() . '/assets/js/prism/prism.js', array('jquery'), $scriptVersion, true);
    // wp_enqueue_script('prism-highlight-autolinker',  get_template_directory_uri() . '/assets/js/prism/prism-autolinker.min.js');
    // wp_enqueue_script('prism-highlight-file-highlight',  get_template_directory_uri() . '/assets/js/prism/prism-file-highlight.min.js');
    // wp_enqueue_script('prism-highlight-line-highlight',  get_template_directory_uri() . '/assets/js/prism/prism-line-highlight.min.js');
    wp_enqueue_script('prism-highlight-line-numbers',  get_template_directory_uri() . '/assets/js/prism/prism-line-numbers.min.js', array('prism-highlight-js'), $scriptVersion, true);
    // wp_enqueue_script('prism-highlight-show-language',  get_template_directory_uri() . '/assets/js/prism/prism-show-language.min.js', array(), $scriptVersion, true);
    wp_enqueue_script('prism-highlight-js-comp',  get_template_directory_uri() . '/assets/js/prism/components/prism-javascript.min.js', array('prism-highlight-js'), $scriptVersion, true);
    // wp_enqueue_script('prism-highlight-markup-comp',  get_template_directory_uri() . '/assets/js/prism/components/prism-markup.min.js', array(), $scriptVersion, true);




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