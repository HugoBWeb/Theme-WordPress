<?php
/*
Template Name: Contact
*/
?>

<?php get_header() ?>

<main>

    <?php if (have_posts()) : ?>
        <!-- Si j'ai des Posts, j'affiche cette partie -->
        <?php while (have_posts()) : the_post(); ?>
            <h1>
                <?php the_title() ?>
            </h1>
            <?php the_content() ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2738.1280302549967!2d0.35523231579681314!3d46.66373336062294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fdbd29d8ce8893%3A0x32fb807d25b3e6fd!2sAFPA!5e0!3m2!1sfr!2sfr!4v1626850145515!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
    <?php endif; ?>

</main>

<?php get_footer() ?>