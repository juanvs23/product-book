<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Product_book
 */

get_header();

?>
<div class="container-fluid single-books" style="max-width:90%;">
    <div class="row">
        <main class="col-xl-8">
        <?php
		while ( have_posts() ) :
			the_post();
            ?>
      <article>
      <header class="header-content" role="banner">
      <h1 class="text-center mb-4 display-2"><?php echo  get_the_title(); ?></h1>
       </header>
        <?php
            set_query_var('model',['model'=>3,'id'=>get_the_ID()]);
          get_template_part('template-parts/books/book', 'item');
        ?>
       <?php endwhile;?>
      </article>
        </main>
        <aside class="col-xl-4">
            <?php
            get_sidebar();
            ?>
        </aside>
    </div>
</div>
<?php
get_footer();

