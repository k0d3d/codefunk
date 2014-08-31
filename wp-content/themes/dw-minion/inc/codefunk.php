<?php
/**
 * To display the full TinyMCE text editor so you
 * have access to all of the advanced features available,
 * @param  {[type]} $buttons [description]
 * @return {[type]}          [description]
 */
function enable_more_buttons($buttons) {

// $buttons[] = 'fontselect';
// $buttons[] = 'fontsizeselect';
// $buttons[] = 'styleselect';
// $buttons[] = 'backcolor';
// $buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
// $buttons[] = 'hr';
// $buttons[] = 'visualaid';

return $buttons;
}

/**
 * To keep the kitchen sink always on,
 * @param  [type] $in [description]
 * @return [type]     [description]
 */

function myformatTinyMCE( $in ) {

$in['wordpress_adv_hidden'] = FALSE;

return $in;
}

// add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
add_filter("mce_buttons_3", "enable_more_buttons");



?>