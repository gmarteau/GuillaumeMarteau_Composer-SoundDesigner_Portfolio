<?php $i = (string) $args['inc']; ?>

<div class="projectCard projectCard--<?= $i; ?>">
    <div class="projectCard__card">
        <?php the_post_thumbnail('thumbnail', ['class' => 'projectCard__card__img']); ?>
    </div>

    <a class="projectCard__hover" href="<?php the_permalink() ?>">
        <h3 class="projectCard__hover__title"><?php the_title() ?></h3>
    </a>
</div>