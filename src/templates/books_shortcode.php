<?php

    $books = new WP_Query([
        'post_type' => 'books',
        'numberposts' => -1

    ]);

    $user_id = get_current_user_id();
    $userFavouritesBooks = empty(get_user_meta($user_id, 'favourite_books', true)) ? [] : get_user_meta($user_id, 'favourite_books', true);

?>

<p class="shortcode-title">All our books</p>

<?php
    if ($books->have_posts()): ?>
    <section id="books">
        <?php
            while ($books->have_posts()): $books->the_post(); ?>

            <div class="book">
                <a href="<?= get_the_permalink() ?>" target="_blank">
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                </a>
                <?php if ($user_id !== 0): ?>
                <div class="books-actions">
                    <button class="book-actions-button <?= in_array((int) get_the_ID(), $userFavouritesBooks) ? 'favourite' : '' ?>" data-book-id="<?= get_the_ID() ?>">
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
    endif;
