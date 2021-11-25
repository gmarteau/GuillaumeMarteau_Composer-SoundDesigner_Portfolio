<?php get_header(); ?>


<?php while (have_posts()) : the_post() ?>
    <div class="project">
        <?php if ($vimeo_id = get_field('vimeo_id')) : ?>
            <div class="project__video" style="padding:56.25% 0 0 0;position:relative;">
                <iframe src=<?= "https://player.vimeo.com/video/" . $vimeo_id . "?h=e5dc480a06&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" ?> frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Maxico"></iframe>
            </div>
        <?php endif ?>

        <div class="project__description">
            <div class="project__description__text">
                <h1 class="project__description__text__title title"><?php the_title() ?></h1>

                <?php
                $domains = get_the_terms(get_the_ID(), 'domain');
                $skills = get_the_terms(get_the_ID(), 'skill');
                if ($domains || $skills) : 
                ?>
                    <ul class="project__description__text__taxs">
                        <?php if ($domains) : ?>
                            <?php foreach ($domains as $domain) : ?>
                                <li class="project__description__text__taxs__item">
                                    <a href="<?= get_term_link($domain->term_id); ?>" class="link--upper"><?= $domain->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($skills) : ?>
                            <?php foreach ($skills as $skill) : ?>
                                <li class="project__description__text__taxs__item">
                                    <a href="<?= get_term_link($skill->term_id); ?>" class="link--upper"><?= $skill->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>

                <p><?php the_content() ?></p>
            </div>

            <?php if ($soundcloud_id = get_field('soundcloud_id')) : ?>
                <?php
                $soundcloud_slug = get_field('soundcloud_slug');
                $soundcloud_title = get_field('soundcloud_title');
                ?>
                <div class="project__description__sound">
                    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src=<?= "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/" . $soundcloud_id . "&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true" ?>></iframe>
                    <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
                        <a href="https://soundcloud.com/guillaumemarteau" title="Guillaume Marteau" target="_blank" style="color: #cccccc; text-decoration: none;">Guillaume Marteau</a> · <a href=<?= "https://soundcloud.com/guillaumemarteau/" . $soundcloud_slug ?> title=<?= $soundcloud_title ?> target="_blank" style="color: #cccccc; text-decoration: none;"><?= $soundcloud_title ?></a>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <div class="project__more">
            <h2 class="project__more__title">Envie d'en entendre plus?</h2>

            <div class="project__more__grid">
                <?php
                $query = new WP_Query([
                    'post_type' => 'project',
                    'post__not_in' => [get_the_ID()],
                    'posts_per_page' => 3
                ]);
                while ($query->have_posts()) : $query->the_post();
                ?>
                    <?php get_template_part('template-parts/project/project-card'); ?>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>