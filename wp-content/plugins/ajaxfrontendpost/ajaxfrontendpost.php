<?php

/*
Plugin Name: Code Samples
Plugin URI:
Description: Allows to add a code sample from the front end
Author: Michael Koded
Version:
Author URI:
*/

define('APFSURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('APFPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );

function apf_enqueuescripts()
{
    wp_enqueue_script('afp', APFSURL.'/js/afp.js', array('jquery'));
    wp_localize_script( 'afp', 'apfajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('wp_enqueue_scripts', apf_enqueuescripts);


function apf_addpost() {
 // var_dump($_POST);
  if( 'POST' == $_SERVER['REQUEST_METHOD']
    && !empty( $_POST['action'] )
    && isset($_POST['answer_id'])
    && $_POST['post_type'] == 'funk-sample' ) { // Check what the post type is here instead

    // Setting the 'post_type' => $_POST['post_type'] in the $post array below causes 404
    // Just set it based on what is set in the above IF $_POST type == 'book'.
    // and below do 'post_type' => 'book'

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['code_title'])) {
      $title =  $_POST['code_title'];
    } else {
      die( 'Please enter a title');
    }

    if (isset ($_POST['code_sample'])) {
      $content = $_POST['code_sample'];
    } else {
      die( 'Please enter some code here!');
    }

    // Get the array of selected categories as multiple cats can be selected
    // $cat = array( $_POST['cat'] );

    // Add the content of the form to $post as an array
    $post = array(
      'post_title'  => $title,
      'post_content'  => $content,
      'post_status' => 'publish', // Choose: publish, preview, future, etc.
      'post_type'   => 'funk-sample', // Set the post type based on the IF is post_type X
      'post_author'       => '1'
    );

    $postId = wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function
                // http://codex.wordpress.org/Function_Reference/wp_insert_post
    if ($postId != 0) {
      add_post_meta($postId, '_answer_id', $_POST['answer_id'] );
      $result = $postId;
    } else {
      $result = 'Error.';
    }
    //kill script
    echo $result;
    die();
  } else {
    echo ('illegal request');
    die ();
  } // end IF
}

// Do the wp_insert_post action to insert it
// do_action('wp_insert_post', 'do_insert');
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );

?>