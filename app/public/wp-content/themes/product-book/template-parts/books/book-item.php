<?php
$get_query_var = get_query_var('model')?get_query_var('model'):['model'=>1,'id'=>get_the_ID()];
$id = $get_query_var['id'];
$title = get_the_title($id);
$subtitle = get_field('subtitle',$id);
$description = get_field('description',$id);
$star_rating = get_field('star_rating',$id);
$book_cover =  get_field('book_cover',$id)['url'] && get_field('book_cover',$id)['url']!=''?get_field('book_cover',$id)['url']: get_stylesheet_directory_uri().'/imgs/book-placeholder.jpg';
$authors = get_field('authors',$id);
$description = get_field('description',$id);
$genres = get_field('genres',$id);
$release_date = get_field('release_date',$id);
$category_detail=get_the_terms( $id, 'produ_genres' );
$get_model = $get_query_var['model'];
?>   
<div class="book-item model-<?php echo $get_model;?>">
    <div class="book-item-left-part">
        <div class="book-cover-container">
            <img src="<?php echo $book_cover; ?>" alt="<?php echo $title; ?>" class="book-cover">
            <?php if($get_model==1): ?>
                <div class="book-over">
                    <h3 class="subtitle"><?php echo $subtitle; ?></h3>
                        <div class="description">
                            <h4 class="description-title">Sinopsis:</h4>
                            <div class="description-content">
                                <?php
                                if($get_model==3){
                                ?>
                                    <?php echo $description; ?>
                                    
                                    <?php
                                }else{
                                    $button = '<a class="button" href="'.get_the_permalink($id).'">Leer más</a>';
                                    echo produ_books_custom_excerpts(10,$button);   
                                }
                                ?>
                            </div>
                        </div>
                        <div class="author-container">
                            <h4 class="author-title">Autores:</h4>
                            <div class="authors">
                                <?php
                                $new_content=0;
                                foreach($authors as $author){
                                    $new_content++;
                                    $post_author = get_post($author);
                                    echo '<a href="'.get_the_permalink($post_author->ID).'">'.$post_author->post_title.'</a>';
                                    if($new_content < count($authors)){
                                        echo ', ';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="release-data">
                            <b class="publicacion">Fecha de publicación: </b>
                            <?php
                                echo $release_date;
                            ?>
                        </div>
                </div>
            <?php endif; ?>
                </div>
                   <?php if($get_model !=3){
                    ?>
                     <div class="book-metadata-container">
                        <h3 class="book-title">
                            <?php 
                                echo '<a href="'.get_the_permalink($id).'">';
                            echo $title; 
                            echo '</a>';
                            ?>
                        </h3>
                        <div class="rating">
                            <?php
                            $star_limits = 7;
                            $count = 1;
                            for($i=1;$i<=$star_limits;$i++){
                                if($count <= $star_rating){
                                    echo '<i class="bi bi-star-fill"></i>';
                                }else{
                                    echo '<i class="bi bi-star"></i>';
                                }
                                $count++;
                            }
                            ?>
                        </div>
                        <div class="categories">
                            <?php
                        // var_dump($category_detail);
                        $counten=0;
                            foreach($category_detail as $category){
                                $counten++;
                                echo '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
                                if($counten < count($category_detail)){
                                    echo ', ';
                                }
                            } 
                            ?>
                        </div>
                    </div>
                    
                    <?php
                   }?>
    </div>
   <?php if($get_model !=1): ?>
    <div class="book-item-right-part">
        <h3 class="subtitle"><?php echo $subtitle; ?></h3>
      <div class="description">
      <h4 class="description-title">Sinopsis:</h4>
      <div class="description-content">
        <?php
        if($get_model==3){
        ?>
            <?php echo $description; ?>
            
            <?php
        }else{
            $button = '<a class="button" href="'.get_the_permalink($id).'">Leer más</a>';
            echo produ_books_custom_excerpts(10,$button);   
        }
        ?>
        </div>
          
        
         
       
      </div>
        <div class="author-container">
            <h4 class="author-title">Autores:</h4>
            <div class="authors">
                <?php
                $new_content=0;
                foreach($authors as $author){
                    $new_content++;
                    $post_author = get_post($author);
                    echo '<a href="'.get_the_permalink($post_author->ID).'">'.$post_author->post_title.'</a>';
                    if($new_content < count($authors)){
                        echo ', ';
                    }
                }
                ?>
            </div>
        </div>
        <?php if($get_model==3):?>
            <div class="meta-content">
            <div class="rating">
                            <?php
                            $star_limits = 7;
                            $count = 1;
                            for($i=1;$i<=$star_limits;$i++){
                                if($count <= $star_rating){
                                    echo '<i class="bi bi-star-fill"></i>';
                                }else{
                                    echo '<i class="bi bi-star"></i>';
                                }
                                $count++;
                            }
                            ?>
                        </div>
                        <div class="categories">
                            <?php
                        // var_dump($category_detail);
                        $counten=0;
                            foreach($category_detail as $category){
                                $counten++;
                                echo '<a  href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
                                if($counten < count($category_detail)){
                                    echo ', ';
                                }
                            } 
                            ?>
                        </div>
            </div>
        <?php endif; ?>
           <div class="release-data">
            <b class="publicacion">Fecha de publicación: </b>
            <?php
                echo $release_date;
            ?>
           </div>
    </div>
   <?php endif; ?>
</div>