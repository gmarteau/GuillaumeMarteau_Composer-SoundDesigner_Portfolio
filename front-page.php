<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="home__title">
        <h1 class="title title--big"><?php the_title(); ?></h1>
    </div>

    <div class="home__img">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'home__img__pic']); ?>
    </div>

    <div class="home__services">
        <ul class="home__services__list">
            <li class="service service--1">
                <h2 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=composition' ?>">musique à l'image</a></h2>
                <p class="service__description">
                    Je compose la musique originale de votre projet vidéo, qu'il s'agisse d'un court ou long métrage, d'un spot publicitaire ou d'un jeu-vidéo. Je peux également composer l'identité sonore de votre entreprise.
                </p>
            </li>
            <li class="service service--2">
                <h2 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=sound-design' ?>">sound design</a></h2>
                <p class="service__description">
                    Besoin de design sonore sur un projet? Film, jeu-vidéo, installation sonore, identité radiophonique, je vous propose un travail complet afin de répondre au mieux à vos besoins, de la création à la standardisation.
                </p>
            </li>
            <li class="service service--3">
                <h2 class="service__title"><a class="link" href="<?= get_post_type_archive_link('project') . '?skill=integration' ?>">intégration sonore</a></h2>
                <p class="service__description">
                    Vous possédez déjà votre banque de sons et de musiques pour votre jeu-vidéo mais n'avez toujours rien implémenté? Vous recherchez une intégration rapide et efficace sur Unreal Engine ou bien une logique complexe grâce à Wwise? Je suis là pour vous!
                </p>        
            </li>        
        </ul>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>