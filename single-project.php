<?php get_header(); ?>


<?php while (have_posts()) : the_post() ?>
    <div class="row">
        <h1 class="col-12"><?php the_title() ?></h1>
        <div class="col-12">
            <?php the_terms(get_the_ID(), 'domain'); ?>
        </div>
    </div>

    <div class="row">
        <p><?php the_content() ?></p>
    </div>

    <div class="row">
        <h2>Envie d'en entendre plus?</h2>
    </div>

    <div class="row">
        <?php
        $query = new WP_Query([
            'post_type' => 'project',
            'post__not_in' => [get_the_ID()],
            'posts_per_page' => 3
        ]);
        while ($query->have_posts()) : $query->the_post();
        ?>
            <div class="col-lg-4">
                <?php get_template_part('template-parts/project/project-card'); ?>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>