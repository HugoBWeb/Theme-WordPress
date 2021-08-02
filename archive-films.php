<?php get_header('programmation') ?>

<section>
    <h1>
        La programmation <br>
        Des pépites à (re)découvrir ...
    </h1>
    <?php if (have_posts()) : ?>
        <!-- Si j'ai des Posts, j'affiche cette partie -->
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" >
                <h2><?php the_title() ?></h2>
                <?php the_excerpt() ?>
                <a href="<?php the_permalink() ?>" class="btn">En savoir +</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
    <?php endif; ?>
</section>

<?php get_footer() ?>