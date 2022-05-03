<?php

namespace Books;

class AJAX
{

    public function __construct() {}

    function books_ajax_init() {
        $this->books_load_ajax_scripts();
    }

    function books_load_ajax_scripts() {
//        add_action('wp_enqueue_scripts', [$this, 'books_localize_scripts']);
        $this->books_init_ajax_scripts();
    }

    function books_localize_scripts() {
    }

    function books_init_ajax_scripts() {
//        add_action('wp_ajax_nopriv_books_add_to_favourites', [$this, 'books_add_to_favourites']);
        add_action('wp_ajax_books_add_to_favourites', [$this, 'books_add_to_favourites']);
    }

    /**
     * @description Function to add a book to user favourites books
     * @return void
     */
    function books_add_to_favourites() {

        $user_id = get_current_user_id();

        $book_id = (int) $_POST['book_id'];
        $favourite_books = get_user_meta($user_id, 'favourite_books', true);

        $response_message = 'Book added to your favourites';

        // Check if Favourite Books is empty and IS NOT an array
        if (empty($favourite_books) && !is_array($favourite_books)) {
            add_user_meta($user_id, 'favourite_books', [$book_id]);
        }else {
            // Check if Book ID is not in favourites
            if (!in_array($book_id, $favourite_books)) {
                $favourite_books[] = $book_id;

            }else {
                // If yes, remove it from favourites
                array_splice($favourite_books, array_search($book_id, $favourite_books), 1);

                $response_message = 'Book removed from your favourites';

            }
            update_user_meta($user_id, 'favourite_books', $favourite_books);
        }

        wp_send_json([
            'message' => $response_message,
            'favourites' => $favourite_books
        ]);

    }

}