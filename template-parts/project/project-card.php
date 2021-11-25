<?php $i = (string) $args['inc']; ?>

<div class="projectCard <?= is_singular() ? 'projectCard--singleProject' : '' ?> <?= $i ? 'projectCard--' . $i : '' ?>">
    <div class="projectCard__card">
        <?php if (is_singular()) : ?>
            <?php the_post_thumbnail('thumbnail', ['class' => 'projectCard__card__img no-filter']); ?>
        <?php else : ?>
            <?php the_post_thumbnail('thumbnail', ['class' => 'projectCard__card__img', 'id' => 'img--' . $i]); ?>
        <?php endif; ?>
    </div>

    <a id="card--<?= $i ?>" class="projectCard__hover" href="<?php the_permalink() ?>">
        <p class="projectCard__hover__title"><?php the_title() ?></p>
    </a>
</div>