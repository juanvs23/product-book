<?php
$term = get_query_var('term'); 
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
  $args= array(
    'post_type' => 'Produ_author',
    'posts_per_page' =>8,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'ASC',
    'post_status' => 'publish',
);

echo '<div class="row d-flex justify-content-center">';
$query = new WP_Query($args);
 if($query->have_posts()):
    while($query->have_posts()):
        $query->the_post();
       echo '<article class="col-12 col-xl-6 container-author-list-item col-xxl-4 pb-4">';
  
       set_query_var('model',['model'=>'listing','id'=>get_the_ID()]);
       get_template_part('template-parts/author/author', 'item');
     
       echo '</article>';
    endwhile;
endif;
echo '</div>';
$total_pages =  $query->max_num_pages;

if ($total_pages > 1){

    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text'    => __('« prev'),
        'next_text'    => __('next »'),
    ));
}
wp_reset_postdata();
?>