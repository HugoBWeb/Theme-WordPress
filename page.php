<?php get_header() ?>

<main>
    <?php if (have_posts()) : ?>
        <!-- Si j'ai des Posts, j'affiche cette partie -->
        <?php while (have_posts()) : the_post(); ?>
            <h1>
                <?php the_title() ?>
            </h1>
            <?php the_content() ?>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
    <?php endif; ?>
</main>
<?php get_footer() ?>