<?php
if ( ! function_exists('produ_book_post_type') ) {

    // Register Custom Post Type
    function produ_book_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Books', 'Post Type General Name', 'product-book' ),
            'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'product-book' ),
            'menu_name'             => __( 'Books', 'product-book' ),
            'name_admin_bar'        => __( 'Books', 'product-book' ),
            'archives'              => __( 'Book Archives', 'product-book' ),
            'attributes'            => __( 'Book Attributes', 'product-book' ),
            'parent_item_colon'     => __( 'Parent book:', 'product-book' ),
            'all_items'             => __( 'All books', 'product-book' ),
            'add_new_item'          => __( 'Add New book', 'product-book' ),
            'add_new'               => __( 'Add New', 'product-book' ),
            'new_item'              => __( 'New book', 'product-book' ),
            'edit_item'             => __( 'Edit book', 'product-book' ),
            'update_item'           => __( 'Update book', 'product-book' ),
            'view_item'             => __( 'View book', 'product-book' ),
            'view_items'            => __( 'View books', 'product-book' ),
            'search_items'          => __( 'Search book', 'product-book' ),
            'not_found'             => __( 'Book Not found', 'product-book' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'product-book' ),
            'featured_image'        => __( 'Featured Image', 'product-book' ),
            'set_featured_image'    => __( 'Set featured image', 'product-book' ),
            'remove_featured_image' => __( 'Remove featured image', 'product-book' ),
            'use_featured_image'    => __( 'Use as featured image', 'product-book' ),
            'insert_into_item'      => __( 'Insert into book', 'product-book' ),
            'uploaded_to_this_item' => __( 'Uploaded to this book', 'product-book' ),
            'items_list'            => __( 'books list', 'product-book' ),
            'items_list_navigation' => __( 'Books list navigation', 'product-book' ),
            'filter_items_list'     => __( 'Filter Books list', 'product-book' ),
        );
        $rewrite = array(
            'slug'                  => 'book',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Book', 'product-book' ),
            'description'           => __( 'A simple book list', 'product-book' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'taxonomies'            => array( 'produ_genres' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-book-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'books-list',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'rest_base'             => 'produ-book',
        );
        register_post_type( 'produ_book', $args );
    
    }
    add_action( 'init', 'produ_book_post_type', 0 );
    
    }