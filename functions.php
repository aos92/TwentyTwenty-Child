<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

/* Hide the category above the post title */
add_filter('twentytwenty_show_categories_in_entry_header', '__return_false');

/* Change the navigation menu icon */
function replace_ellipses_menu_ian( $iconsArr ) { 	
   $iconsArr['ellipsis'] = '<svg version="1.1" 
width="124px" 
height="124px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124 124" >  <path d="M112,6H12C5.4,6,0,11.4,0,18s5.4,12,12,12h100c6.6,0,12-5.4,12-12S118.6,6,112,6z"/>  <path d="M112,50H12C5.4,50,0,55.4,0,62c0,6.6,5.4,12,12,12h100c6.6,0,12-5.4,12-12C124,55.4,118.6,50,112,50z"/> 	<path d="M112,94H12c-6.6,0-12,5.4-12,12s5.4,12,12,12h100c6.6,0,12-5.4,12-12S118.6,94,112,94z"/> 
   </svg>';
   return $iconsArr; 	 
}
add_filter( 'twentytwenty_svg_icons_ui', 'replace_ellipses_menu_ian' );

/* Hide all page titles */
add_action( 'wp_head', 'hide_title' );
function hide_title() {
  if ( is_page() ) { // cek apakah halaman
    echo '<style type="text/css">.entry-header { display:none; }</style>'; // sembunyikan judul halaman
  }
}

?>
