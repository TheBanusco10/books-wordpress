<?php

namespace Books;

class Books
{
    private $booksCPT;

    public function __construct() {
        $this->booksCPT = new BooksCPT();
    }

    public function books_init() {
        $this->booksCPT->bookscpt_init();
        add_shortcode('books', [$this, 'books_create_shortcode']);
    }

    /**
     * @description Creates shortcode to display Books
     * @return false|string
     */
    public function books_create_shortcode() {
        ob_start();

        include plugin_dir_path(__FILE__) . 'templates/books_shortcode.php';

        return ob_get_clean();
    }
}