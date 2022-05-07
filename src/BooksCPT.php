<?php

namespace Books;

class BooksCPT
{
    public function __construct() {}

    public function bookscpt_init() {
        add_action('init', [$this, 'books_create_cpt']);
    }

    public function books_create_cpt() {

        $args = [
            'label' => 'Books',
            'public' => true,
            'capability_type' => ['book', 'books'],
            'show_ui' => true,
            'show_in_menu' => true,
            'rewrite' => ['slug' => 'books'],
            'menu_icon' => 'dashicons-book',
            'menu_position' => 7,
            'hierarchical'       => false,
            'supports'           => ['title', 'editor', 'comments', 'thumbnail'],
            'map_meta_cap'       => true
        ];

        register_post_type('books', $args);

        $this->books_set_capabilites();
        flush_rewrite_rules();
    }

    private function books_set_capabilites() {
        $roles = ['administrator', 'editor'];

        foreach ($roles as $role) {
            $the_rol = get_role($role);

            $the_rol->add_cap('read');
            $the_rol->add_cap('edit_books');
            $the_rol->add_cap('publish_books');
            $the_rol->add_cap('edit_published_books');
            $the_rol->add_cap('delete_books');
        }
    }
}