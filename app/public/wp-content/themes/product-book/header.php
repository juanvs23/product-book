<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Product_book
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'product-book' ); ?></a>

	<header id="masthead" class="site-header">
			<nav id="top-header" class="navbar navbar-expand-md d-block navbar-dark bg-dark" aria-label="navbar">
				<div class="container-fluid" style="max-width:90%;">
					<?php 
					if (get_custom_logo() && get_custom_logo()!='') {
						echo get_custom_logo();
					}else{
						echo get_bloginfo( 'name' );
					}
					$set_menu_id1 = 'navbarsExample01';
					?>
					<button 
						class="navbar-toggler" 
						type="button" 
						data-bs-toggle="collapse" 
						data-bs-target="#<?php echo $set_menu_id1;?>" 
						aria-controls="<?php echo $set_menu_id1;?>" 
						aria-expanded="false" 
						aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
					</button>
		
		
					<?php
						set_query_var('selecto_id',$set_menu_id1);
						echo get_template_part( 'template-parts/template-header' );
					?>
				</div>
				<div class="container">
					<?php
					echo get_template_part( 'template-parts/genres-menu' );
					?>
				</div>
			</nav>
		  	<nav id="top-lower" class="navbar navbar-expand-md navbar-dark d-block bg-dark" aria-label="navbar">
   			 <div class="container-fluid" style="max-width:90%;">
				<?php 
				if (get_custom_logo() && get_custom_logo()!='') {
					echo get_custom_logo();
				}else{
					echo get_bloginfo( 'name' );
				}
				$set_menu_id2 = 'navbarsExample02';
				?>
				<button 
					class="navbar-toggler" 
					type="button" 
					data-bs-toggle="collapse" 
					data-bs-target="#<?php echo $set_menu_id2;?>" 
					aria-controls="<?php echo $set_menu_id2;?>" 
					aria-expanded="false" 
					aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>
				<?php
						set_query_var('selector_id',$set_menu_id2);
						echo get_template_part( 'template-parts/template-header' );
					?>
				</div>
				<div class="container">
					<?php
					echo get_template_part( 'template-parts/genres-menu' );
					?>
				</div>
			</nav>
	</header><!-- #masthead -->
