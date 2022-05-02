<?php

namespace Books;

class Books
{
    private $booksCPT;
    private $templateManager;

    public function __construct() {
        $this->booksCPT = new BooksCPT();
        $this->templateManager = new Templates();
    }

    public function books_init() {

        // Inits Books CPT
        $this->booksCPT->bookscpt_init();

        // Loads scripts and styles
        $this->books_call_load_scripts();

        // Shortcodes
        add_shortcode('books', [$this, 'books_create_shortcode']);

        // Override Templates
        $this->templateManager->books_call_load_author_template();
    }

    /**
     * @description Creates shortcode to display Books
     * @return false|string
     */
    function books_create_shortcode() {
        ob_start();

        $this->templateManager->books_include_shortcode_template();

        return ob_get_clean();
    }

    private function books_call_load_scripts() {
        add_action('wp_enqueue_scripts', [$this, 'books_load_scripts']);
    }

    function books_load_scripts() {
        wp_enqueue_style('books-template', plugin_dir_url(__FILE__) . 'css/books_template.css');
    }


}