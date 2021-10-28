<?php get_header(); ?>


<?php while (have_posts()) : the_post() ?>
    <div class="row">
        <h1 class="col-12"><?php the_title() ?></h1>
        <div class="col-12">
            <?php the_terms(get_the_ID(), 'domain', '', ' / ', ''); ?>
        </div>
        <div class="col-12">
            <?php the_terms(get_the_ID(), 'skill', '', ' / ', ''); ?>
        </div>
    </div>

    <div class="row">
        <p><?php the_content() ?></p>
    </div>

    <?php if ($vimeo_id = get_field('vimeo_id')) : ?>
        <div class="row">
            <div style="padding:56.25% 0 0 0;position:relative;">
                <iframe src=<?= "https://player.vimeo.com/video/" . $vimeo_id . "?h=e5dc480a06&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" ?> frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Maxico"></iframe>
            </div>
        </div>
    <?php endif ?>

    <?php if ($soundcloud_id = get_field('soundcloud_id')) : ?>
        <?php
        $soundcloud_slug = get_field('soundcloud_slug');
        $soundcloud_title = get_field('soundcloud_title');
        ?>
        <div class="row">
            <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src=<?= "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/" . $soundcloud_id . "&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true" ?>></iframe>
            <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
                <a href="https://soundcloud.com/guillaumemarteau" title="Guillaume Marteau" target="_blank" style="color: #cccccc; text-decoration: none;">Guillaume Marteau</a> · <a href=<?= "https://soundcloud.com/guillaumemarteau/" . $soundcloud_slug ?> title=<?= $soundcloud_title ?> target="_blank" style="color: #cccccc; text-decoration: none;"><?= $soundcloud_title ?></a>
            </div>
        </div>
    <?php endif ?>

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