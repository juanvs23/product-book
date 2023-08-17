<?php
if ( ! function_exists('produ_author_post_type') ) {

    // Register Custom Post Type
    function produ_author_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Authors', 'Post Type General Name', 'product-Author' ),
            'singular_name'         => _x( 'Author', 'Post Type Singular Name', 'product-Author' ),
            'menu_name'             => __( 'Authors', 'product-Author' ),
            'name_admin_bar'        => __( 'Authors', 'product-Author' ),
            'archives'              => __( 'Author Archives', 'product-Author' ),
            'attributes'            => __( 'Author Attributes', 'product-Author' ),
            'parent_item_colon'     => __( 'Parent Author:', 'product-Author' ),
            'all_items'             => __( 'All Authors', 'product-Author' ),
            'add_new_item'          => __( 'Add New Author', 'product-Author' ),
            'add_new'               => __( 'Add New', 'product-Author' ),
            'new_item'              => __( 'New Author', 'product-Author' ),
            'edit_item'             => __( 'Edit Author', 'product-Author' ),
            'update_item'           => __( 'Update Author', 'product-Author' ),
            'view_item'             => __( 'View Author', 'product-Author' ),
            'view_items'            => __( 'View Authors', 'product-Author' ),
            'search_items'          => __( 'Search Author', 'product-Author' ),
            'not_found'             => __( 'Author Not found', 'product-Author' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'product-Author' ),
            'featured_image'        => __( 'Featured Image', 'product-Author' ),
            'set_featured_image'    => __( 'Set featured image', 'product-Author' ),
            'remove_featured_image' => __( 'Remove featured image', 'product-Author' ),
            'use_featured_image'    => __( 'Use as featured image', 'product-Author' ),
            'insert_into_item'      => __( 'Insert into Author', 'product-Author' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Author', 'product-Author' ),
            'items_list'            => __( 'Authors list', 'product-Author' ),
            'items_list_navigation' => __( 'Authors list navigation', 'product-Author' ),
            'filter_items_list'     => __( 'Filter Authors list', 'product-Author' ),
        );
        $rewrite = array(
            'slug'                  => 'author',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Author', 'product-Author' ),
            'description'           => __( 'A simple author list', 'product-Author' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-edit',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'authors',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'rest_base'             => 'produ-Author',
        );
        register_post_type( 'Produ_author', $args );
    
    }
    add_action( 'init', 'produ_author_post_type', 0 );
    
    }