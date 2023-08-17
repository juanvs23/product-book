<?php
$get_model = get_query_var('model')?get_query_var('model'):['model'=>'post','id'=>get_the_ID()];
$id = $model['id'];
$model = $model['model'];
$title =  get_the_title($id);
$name = get_field('name',$id);
$biography = get_field('biography',$id);
$books = !is_null(get_field('books',$id)) && get_field('books',$id)!=''?get_field('books',$id):[];
$featured_img_url = get_the_post_thumbnail_url($id,'full') && get_the_post_thumbnail_url($id,'full')!=''?get_the_post_thumbnail_url($id,'full'): get_stylesheet_directory_uri().'/imgs/usuario_comentarios.png'; 

if ($model == 'post') {
    # code...
    ?>
    <article class="row d-flex">
       <div class="row d-flex justify-content-between">
       <div class="col-12 col-md-6 col-lg-4 poster-container">
            <img src="<?php echo $featured_img_url; ?>" alt="<?php echo $title; ?>" class="img-fluid poster-img">
            <div class="name-container">
                <h2 class="name text-center mb-3"><?php echo $name; ?></h2>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-8 biography-container">
            <div class="biography">
                <?php echo $biography; ?>
            </div>
        </div>
       </div>
       <div class="row justify-content-center">
        <h2 class="col-12 book-list">Libros mas reconocidos</h2>
        <div class="col-12 ours-books-container">
            <div id="our-books" class="ours-books">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($books as $book) {
                            # code...
                            $book_post = get_post($book);
                            //var_dump($book_post);
                            echo '<div class="swiper-slide our-book-item" >';
                            set_query_var('model',['model'=>1,'id'=> $book_post->ID]);
                            get_template_part('template-parts/books/book', 'item');
                            echo '</div>';
                        }
                        ?>
                    </div>
            </div>
        </div>
       </div>
    </article>
    <?php
}elseif ($model == 'listing') {
    # code...
    ?>
   <div class="author-listing-item">
    <div class="author-poster-wrapper">
        <img src="<?php echo $featured_img_url; ?>" alt="" class="img-fluid poster-img">
    </div>
    <div class="author-info">
        <h2 class="name text-center mb-3"><a  href="<?php echo get_the_permalink($id); ?>"><?php echo $title; ?></a> </h2>
    
       <div class="author-bio"><div class="excerpt-infor">
       <?php
          $button = '</div><a class="button" href="'.get_the_permalink($id).'">Leer más</a>';
          echo produ_books_custom_excerpts(7,$button);   
        ?>
       </div>
    </div>
   </div>
    <?php
}elseif($model == 'minimal'){
    # code...
    ?>
    <article class="author-minimal">
        <a href="<?php echo get_the_permalink($id); ?>">
            <div class="author-minimal-content">
                <img src="<?php echo $featured_img_url; ?>" alt="" class="img-fluid poster-img">
                <h3 class="text-center"><?php echo $title; ?></h3>
            </div>
        </a>
        <div class="minimal-books list-group">
            <div class="list-group-item-primary list-group-item">
                <h4 class="display-7 text-center">Libros más reconocidos</h4>
            </div>
            <?php
            $count = 0;
            foreach ($books as $book) {
                $count++;
                if ($count < 5) {
                
                    ?>
                    <a href="<?php echo get_the_permalink($book); ?>" class="list-group-item list-group-item-action"><?php echo get_the_title($book); ?></a>
                   
                    <?php
                }
            }?>
        </div>
    </article>
    <?php
}
?>


