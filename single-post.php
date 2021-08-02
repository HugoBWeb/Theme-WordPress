<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <!-- Si j'ai des Posts, j'affiche cette partie -->
    <?php while (have_posts()) : the_post(); ?>

        <main class="single">
            <h1>
                <?php the_title() ?>
            </h1>
            
            <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
            <?php the_content() ?>
        </main>
        
    <?php endwhile; ?>
<?php else : ?>
    <!-- Si il n'y a pas de Post, j'affiche cette partie -->
<?php endif; ?>

<?php get_footer(); ?>