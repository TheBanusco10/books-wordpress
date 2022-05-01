<?php

    $books = new WP_Query([
        'post_type' => 'books',
        'numberposts' => -1

    ]);

//    echo "<pre>";
//    var_dump($books);
//    echo "</pre>";

?>

<h1>Displaying books</h1>

<?php
    if ($books->have_posts()): ?>
        <ul>
            <?php
                while ($books->have_posts()): $books->the_post(); ?>

                <li>
                    <?= the_title() ?>
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                </li>

                <?php
                endwhile;
            ?>
        </ul>


<?php
    endif;
