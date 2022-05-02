<?php

    $books = new WP_Query([
        'post_type' => 'books',
        'numberposts' => -1

    ]);

//    echo "<pre>";
//    var_dump($books);
//    echo "</pre>";

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
            </div>

            <?php
            endwhile;
        ?>
    </section>


<?php
    endif;
