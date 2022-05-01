<?php

/*
Plugin Name: Books
Description: Create books and display them easily on your website
Version: 1.0
Author: David
Author URI: https://djvdev.com
License: GPL3
*/

use Books\Books;

defined('ABSPATH') or die();

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

$books = new Books();

$books->books_init();