<?php get_header('actu'); ?>

<main class="categoryList">
    <h1>Actualités</h1>
    <?php if (have_posts()) : ?>
        <!-- Si j'ai des Posts, j'affiche cette partie -->
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <div>
                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                </div>
                <div>
                    <h2><?php the_title() ?></h2>
                    <p><?php the_excerpt() ?></p>
                    <a class="btn" href="<?php the_permalink() ?>">Lire la suite</a>
                </div>
            </article>
        <?php endwhile; ?>
        <div class="pagination">
            <?php posts_nav_link(' ','←','→'); ?>
        </div>
        
    <?php else : ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
    <?php endif; ?>
</main>
<?php get_footer(); ?>