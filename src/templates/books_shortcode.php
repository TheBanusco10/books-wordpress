<?php

$user_id = get_current_user_id();
$user = wp_get_current_user();
$userFavouritesBooks = empty(get_user_meta($user_id, 'favourite_books', true)) ? [] : get_user_meta($user_id, 'favourite_books', true);

if (filter_var($args['favourite_books'], FILTER_VALIDATE_BOOLEAN)) {
    if (!empty($userFavouritesBooks))
        $books = new WP_Query([
            'post_type' => 'books',
            'numberposts' => -1,
            'post__in' => $userFavouritesBooks
        ]);
    else
        $books = null;
} else {
    $books = new WP_Query([
        'post_type' => 'books',
        'numberposts' => -1,
    ]);
}

if ($books && $books->have_posts()): ?>
    <?php if ($user_id !== 0): ?>
        <a href="<?= get_site_url(null, "/author/$user->user_login") ?>">
            <span class="dashicons dashicons-admin-users"></span>
        </a>
    <?php endif; ?>

    <section id="books">
        <?php
        while ($books->have_posts()): $books->the_post(); ?>

            <div class="book">
                <a href="<?= get_the_permalink() ?>" target="_blank">
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                </a>
                <?php if ($user_id !== 0): ?>
                    <div class="books-actions">
                        <button class="book-actions-button <?= in_array((int)get_the_ID(), $userFavouritesBooks) ? 'favourite' : '' ?>"
                                data-book-id="<?= get_the_ID() ?>">
                            <span class="dashicons dashicons-heart book-actions-icons"></span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

        <?php
        endwhile;
        ?>
    </section>


<?php
else: ?>
    <p>Your favourite books list is empty.</p>
<?php
endif;
