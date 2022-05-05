<?= get_header(); ?>

<div class="wp-site-blocks">
    <h1><?= get_the_author() ?></h1>

    <?= do_shortcode('[books favourite_books=true]') ?>
</div>


<?php

get_footer();
?>
