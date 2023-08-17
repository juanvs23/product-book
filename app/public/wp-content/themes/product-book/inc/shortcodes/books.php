<?php 
/**
 * [product_book_slider slider="carousel"]
 */
function product_book_slider_func($atts){
    $atts = shortcode_atts( array(
        'type' => 'carousel',
        'addclass'=>'',
        'term'=>'',
        'orderby'=>'date',
        'order'=>'DESC',
        'posts_per_page'=>-1,

    ), $atts );
    ob_start();
    $container_classes =str_replace(',',' ', $atts['addclass']);
    $slider_type = $atts['type'];
    $term = $atts['term'];
    $orderby = $atts['orderby'];
    $order = $atts['order'];
    $posts_per_page = $atts['posts_per_page'];
   ?>
<?php if($slider_type == 'carousel'): ?>
    <section   class="carousel-container <?php echo $container_classes; ?>">
    <div id="carousel-home">
        <div class="swiper-wrapper">
        <?php
            $args= array(
                'post_type' => 'produ_book',
                'posts_per_page' =>$posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'post_status' => 'publish',
            );
            if($term){
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'produ_book_category',
                        'field' => 'slug',
                        'terms' => $term,
                    )
                );
            }
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                   echo '<article class="home-carousel-item swiper-slide">';
              
                   set_query_var('model',['model'=>1,'id'=>get_the_ID()]);
                   get_template_part('template-parts/books/book', 'item');
                 
                   echo '</article>';
                endwhile;
            endif;
            ?>
        </div>
         <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    
    <!-- If we need navigation buttons -->
    
</div>
<div class="carousel-home-prev">
<i class="bi bi-chevron-left"></i>
</div>
<div class="carousel-home-next">
<i class="bi bi-chevron-right"></i>
</div>
    </section>
<?php elseif($slider_type == 'grid'): ?>
    <section  class="grid row d-flex justify-content-center <?php echo $container_classes; ?>">
    <?php
            $args= array(
                'post_type' => 'produ_book',
                'posts_per_page' =>$posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'post_status' => 'publish',
            );
            if($term){
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'produ_genres',
                        'field' => 'slug',
                        'terms' => $term,
                    )
                );
            }
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                   echo '<article class="col-md-6 col-lg-4 col-xl-3">';
              
                   set_query_var('model',['model'=>1,'id'=>get_the_ID()]);
                   get_template_part('template-parts/books/book', 'item');
                 
                   echo '</article>';
                endwhile;
            endif;
            ?>
    </section>
<?php elseif($slider_type == 'random'): ?>
    <section  class="row d-flex justify-content-center random <?php echo $container_classes; ?>">
        <?php
        $posts = get_posts(array(
            'post_type' => 'produ_book',
            'posts_per_page' =>$posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'post_status' => 'publish',
          ));
          $select_post = $posts[floor(rand(1,count($posts)))-1];
        
            set_query_var('model',['model'=>1,'id'=> $select_post->ID]);
           echo'<div class="random-item col-9 col-md-6">';
           get_template_part('template-parts/books/book', 'item');
           echo '</div>';
          
        ?>
    </section>
<?php endif; 
wp_reset_postdata();
?>
   <?php
   return ob_get_clean();
}
add_shortcode('product_book_slider','product_book_slider_func');