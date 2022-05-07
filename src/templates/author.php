<?php

// Check if the author is the current user, otherwise redirect to the user's page.
$current_user = wp_get_current_user();
$path = $_SERVER['REQUEST_URI'];
$slug = '/author/';
$user_path = substr($path, strlen($slug));

str_contains($user_path, $current_user->user_login) or wp_redirect(get_author_posts_url($current_user->ID));

?>

<?= get_header(); ?>

<div class="wp-site-blocks">
    <h1><?= get_the_author() ?></h1>

    <?= do_shortcode('[books favourite_books=true]') ?>
</div>


<?php

get_footer();
?>
