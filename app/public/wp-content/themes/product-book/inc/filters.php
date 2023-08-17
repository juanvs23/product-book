<?php



  /**
   * Add class to custom logo
   */
  add_filter( 'get_custom_logo', 'change_logo_class' );


function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'img-fluid', $html );
    $html = str_replace( 'img-fluid-link', 'navbar-brand', $html );
    $html = str_replace( '<a ', '<a id="brand-logo"', $html );

    return $html;
} 

/**
 *  trim excerpts
 */

function produ_books_custom_excerpts($limit,$button='...') {
  return wp_trim_words(get_the_excerpt(), $limit, $button);
}; 