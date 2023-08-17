<?php
require __DIR__ .'/lasted-books.php';

function produ_register_lasted_books() {
    register_widget( 'LastedBooks' );
}
add_action( 'widgets_init', 'produ_register_lasted_books' );