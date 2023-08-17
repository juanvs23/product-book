<?php
if (!class_exists('LastedBooks')) {
    class LastedBooks extends WP_Widget {

        public $post_number = 4;
        public $post_type = 'produ_book';
        public $title = 'Latest Books';


        function __construct() {
            parent::__construct(
            // widget ID
            'produ_latest_books',
            // widget name
           $this->title,
            // widget description
            array ( 'description' => __( 'Show latest books', 'product-book' ), )
            );
            }
    
	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract( $args );
        
		$title = apply_filters( 'widget_title', $instance['title'] );
        
        
		echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
       
		?>
		<div class="post-books">
            <?php
            $args = array(
                'post_type' => $instance['post_type'] ,
                'posts_per_page' => $instance['post_number'],
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) : $query->the_post();
                $id = get_the_ID();
                if($instance['post_type'] == 'produ_book'){
                    $title_name = get_the_title($id);
                    $subtitle = get_field('subtitle',$id);
                    $description = get_field('description',$id);
                    $star_rating = get_field('star_rating',$id);
                    $book_cover =  get_field('book_cover',$id)['url'] && get_field('book_cover',$id)['url']!=''?get_field('book_cover',$id)['url']: get_stylesheet_directory_uri().'/imgs/book-placeholder.jpg';
                    $authors = get_field('authors',$id);
                    $description = get_field('description',$id);
                    $genres = get_field('genres',$id);
                    $release_date = get_field('release_date',$id);
                    $category_detail=get_the_terms( $id, 'produ_genres' );
                }elseif($instance['post_type'] == 'Produ_author'){
                    $title_name =  get_the_title($id);
                    $name = get_field('name',$id);
                    $biography = get_field('biography',$id);
                   
                   
                    
                }else{

                }
                ?>
                <div class="post-book">
                    <div class="image-section">
                         <a class="post-book-img" href="<?php the_permalink($id); ?>">
                           <?php
                           if ($instance['post_type'] == 'produ_book') {
                            ?>
                             <img src="<?php echo $book_cover; ?>" alt="<?php echo $title_name; ?>">
                            <?php
                           } else {
                            # code...
                            $book_cover = get_the_post_thumbnail_url($id,'full') && get_the_post_thumbnail_url($id,'full')!=''?get_the_post_thumbnail_url($id,'full'): get_stylesheet_directory_uri().'/imgs/usuario_comentarios.png'; 
                            ?>
                             <img src="<?php echo $book_cover; ?>" alt="<?php echo get_the_title(); ?>">
                            <?php
                           }
                           ?>
                        </a>
                     </div> 
                     <div class="info-data">
                     <a class="post-book-img" href="<?php the_permalink($id); ?>">
                        <h3><?php echo get_the_title(); ?></h3>
                        <div class="excerpt-content">
                            <?php
                             $button = '... Leer más';
                             echo produ_books_custom_excerpts(8,$button);   
                            ?>
                        </div>
                        </a>
                        <?php if($instance['post_type'] == 'produ_book'): ?>
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
                            <div class="authors">
                            <b>Autores:</b>
                         
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
                        <?php endif; 
                       
                        ?>
                        <?php if($instance['post_type'] == 'produ_author'):?>
                            <div class="authors">
                         <b>Libros: </b>
                <?php
                $new_content=0;
                $books = !is_null(get_field('books',$id)) && get_field('books',$id)!=''?get_field('books',$id):[];
                foreach($books as $book){
                    $new_content++;
                    $post_books = get_post($book);
                    echo '<a href="'.get_the_permalink($post_books->ID).'">'.$post_books->post_title.'</a>';
                    if($new_content < count($books)){
                        echo ', ';
                    }
                }
                ?>
            </div>
                        <?php endif; ?>
                     </div> 
                    
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
		<?php
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = $this->title;
		}
        if ( isset( $instance['post_number'] ) ) {
			$post_number = $instance['post_number'];
		} else {
			$post_number = $this->post_number;
		}
        if ( isset( $instance['post_type'] ) ) {
			$post_type = $instance['post_type'];
		} else {
			$post_type = $this->post_type;
		}
		?>
        <style>

        </style>
		<div class="lasted-form-content">
            <div class="input-group">
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'product-book' ); ?></label>
			<input class="widefat input-form" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
            </div>
        </div>
        <div class="lasted-form-content">
            <div class="input-group">
            <label for="<?php echo $this->get_field_name( 'post_type' ); ?>"><?php _e( 'Post Type:', 'product-book' ); ?></label>
			<select 
                name="<?php echo $this->get_field_name( 'post_type' ); ?>" 
                id="<?php echo $this->get_field_id( 'post_type' ); ?>" 
                class="widefat input-form">
            <?php $get_post_types = get_post_types(array( 'public' => true, '_builtin' => false ), 'objects');
            
            foreach( $get_post_types as $get_post_type => $post_type_object ) {
               echo '<option value="' . $post_type_object->name. '" '.$this->check_selected($post_type_object->name, $post_type).' >' . $post_type_object->label . '</option>';
            }
            ?>
              
            </select>
            </div>
        </div>
        <div class="lasted-form-content">
            <div class="input-group">
            <label for="<?php echo $this->get_field_name( 'post_number' ); ?>"><?php _e( 'Post Number:', 'product-book' ); ?></label>
            <input class="widefat input-form" id="<?php echo $this->get_field_id( 'post_number' ); ?>"
                   name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number"
                   value="<?php echo esc_attr( $post_number ); ?>" />
            </div>
        </div>
		<?php
	}
    private function check_selected($target, $selected){
        if($target == $selected){
            return 'selected';
        }
    }
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ?  $new_instance['post_type']  : $this->post_type;
        $instance['post_number'] = ( ! empty( $new_instance['post_number'] ) ) ? strip_tags( $new_instance['post_number'] ) : $this->post_number;

		return $instance;
	}

    }
}