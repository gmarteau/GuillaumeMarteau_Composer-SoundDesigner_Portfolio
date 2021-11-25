<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="home__title">
        <h1 class="title title--big"><?php the_title(); ?></h1>
        <?= strtoupper(get_the_content()); ?>
    </div>

    <div class="home__img">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'home__img__pic']); ?>
    </div>

    <div class="home__services">
        <ul class="home__services__list">
            <li class="service service--1">
                <h3 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=composition' ?>">musique à l'image</a></h3>
                <p class="service__description">
                    Je compose la musique originale de votre projet vidéo, qu'il s'agisse d'un court ou long métrage, d'un spot publicitaire ou d'un jeu-vidéo. Je peux également composer l'identité sonore de votre entreprise.
                </p>
            </li>
            <li class="service service--2">
                <h3 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=sound-design' ?>">sound design</a></h3>
                <p class="service__description">
                    Besoin de design sonore sur un projet? Film, jeu-vidéo, installation sonore, identité radiophonique, je vous propose un travail complet afin de répondre au mieux à vos besoins, de la création à la standardisation.
                </p>
            </li>
            <li class="service service--3">
                <h3 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=integration' ?>">intégration sonore</a></h3>
                <p class="service__description">
                    Vous possédez déjà votre banque de sons et de musiques pour votre jeu-vidéo mais n'avez toujours rien implémenté? Vous recherchez une intégration rapide et efficace sur Unreal Engine ou bien une logique complexe grâce à Wwise? Je suis là pour vous!
                </p>        
            </li>        
        </ul>
    </div>

    <div class="about">
        <div class="about__title">
            <h3 class="title">Mon parcours</h3>
        </div>

        <div class="about__content">
            <div class="about__content__timeline">
                <ul class="about__content__timeline__moments">
                    <?php
                    $file_location = get_template_directory_uri() . '/assets/json/timeline-keys.json';
                    $json_file_content = file_get_contents($file_location);
                    $moments = json_decode($json_file_content, true);
                    foreach ($moments as $moment) : 
                    ?>
                        <li class="about__content__timeline__moments__moment">
                            <p class="about__content__timeline__moments__moment__date"><?= $moment['date'] ?></p>
                            <div class="about__content__timeline__moments__moment__icon" aria-hidden="true"></div>
                            <p class="about__content__timeline__moments__moment__caption"><?= $moment['caption'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="about__content__bio">
                <p class="about__content__bio__text">
                    <?= get_field('bio'); ?>
                </p>

                <?php if ($spotify = get_field('spotify_embed')) : ?>
                    <div class="about__content__bio__spotify">
                        <h4 class="title">Mon dernier projet perso</h4>
                        <iframe src="<?= $spotify ?>" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>