<?php

namespace Books;

class Templates
{
    function __construct() {}

    function books_call_load_author_template() {
        add_filter('template_include', [$this, 'books_load_author_template']);
    }

    function books_load_author_template($template) {
        if (is_author())
            $template = plugin_dir_path(__FILE__) . 'templates/author.php';

        return $template;
    }

    function books_include_shortcode_template($args) {
        include plugin_dir_path(__FILE__) . 'templates/books_shortcode.php';
    }
}