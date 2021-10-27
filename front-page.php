<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row">
        <h1><?php the_title() ?></h1>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>