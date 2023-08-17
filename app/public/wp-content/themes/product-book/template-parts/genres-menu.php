<?php
$terms = get_terms( array( 
    'taxonomy' => 'produ_genres',
    'parent'   => 0,
    'hide_empty' => false
) );
?>
<div class="menu-category row d-flex justify-content-center">
    <nav id="menu-swiper" class="col-11 col-lg-8">
        <div class="swiper-wrapper">
            <?php foreach ($terms as $term) : ?>
                <div class="swiper-slide menu-category-item">
                    <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </nav>
    <button class="menu-category-prev">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button class="menu-category-next">
        <i class="bi bi-chevron-right"></i>
    </button>
</div>