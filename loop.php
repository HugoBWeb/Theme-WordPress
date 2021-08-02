<main>
    <?php if (have_posts()) : ?>
        <!-- Si j'ai des Posts, j'affiche cette partie -->
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <?php the_post_thumbnail() ?>
                <h1>
                    <?php the_title() ?>
                </h1>
                <p>
                <?php the_excerpt("<div>","</div>") ?>
                </p>
                <a href="<?php the_permalink()?>">En savoir +</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
    <?php endif; ?>
</main>