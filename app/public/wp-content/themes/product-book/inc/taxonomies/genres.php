<?php
if ( ! function_exists( 'produ_genres_tax' ) ) {

    // Register Custom Taxonomy
    function produ_genres_tax() {
    
        $labels = array(
            'name'                       => _x( 'Genres', 'Taxonomy General Name', 'product-Author' ),
            'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'product-Author' ),
            'menu_name'                  => __( 'Genre', 'product-Author' ),
            'all_items'                  => __( 'All Genres', 'product-Author' ),
            'parent_item'                => __( 'Parent Genre', 'product-Author' ),
            'parent_item_colon'          => __( 'Parent Genre:', 'product-Author' ),
            'new_item_name'              => __( 'New Genre Name', 'product-Author' ),
            'add_new_item'               => __( 'Add New Genre', 'product-Author' ),
            'edit_item'                  => __( 'Edit Genre', 'product-Author' ),
            'update_item'                => __( 'Update Genre', 'product-Author' ),
            'view_item'                  => __( 'View Genre', 'product-Author' ),
            'separate_items_with_commas' => __( 'Separate Genres with commas', 'product-Author' ),
            'add_or_remove_items'        => __( 'Add or remove Genres', 'product-Author' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'product-Author' ),
            'popular_items'              => __( 'Popular Genres', 'product-Author' ),
            'search_items'               => __( 'Search Genres', 'product-Author' ),
            'not_found'                  => __( 'Not Found', 'product-Author' ),
            'no_terms'                   => __( 'No Genres', 'product-Author' ),
            'items_list'                 => __( 'Genres list', 'product-Author' ),
            'items_list_navigation'      => __( 'Genres list navigation', 'product-Author' ),
        );
        $rewrite = array(
            'slug'                       => 'genre',
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'query_var'                  => 'genres',
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'produ_genres', array( 'produ_book' ), $args );
    
    }
    add_action( 'init', 'produ_genres_tax', 0 );
    
    }