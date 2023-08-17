<?php
function product_book_author_func($atts){
    $atts = shortcode_atts( array(
        'type' => 'list',
        
        'orderby'=>'date',
        'order'=>'DESC',
        'posts_per_page'=>-1,

    ), $atts );
    
    $type = $atts['type'];
  
    $orderby = $atts['orderby'];
    $order = $atts['order'];
    $posts_per_page = $atts['posts_per_page'];
    ob_start();
    if ($type === 'random') {
        ?>
 <section  class="row d-flex justify-content-center author-random">
        <?php
        $posts = get_posts(array(
            'post_type' => 'Produ_author',
            'posts_per_page' =>$posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'post_status' => 'publish',
          ));
          $select_post = $posts[floor(rand(1,count($posts)))-1];
        
            set_query_var('model',['model'=>'minimal','id'=> $select_post->ID]);
           echo'<div class="random-item col-9 col-md-6">';
           get_template_part('template-parts/author/author', 'item');
           echo '</div>';
          
        ?>
    </section>
    <?php
    }
    
   
    return ob_get_clean();
}
add_shortcode('product_book_author', 'product_book_author_func');