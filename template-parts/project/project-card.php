<?php
$i = (string) $args['inc'];
$is_portrait = in_array($i, ['1', '7', '9']) ? true : false;
?>

<div class="projectCard <?= is_singular() ? 'projectCard--singleProject' : '' ?> <?= $i ? 'projectCard--' . $i : '' ?>">
    <div class="projectCard__card">
        <?php if (is_singular()) : ?>
            <?php if (wp_is_mobile()) : ?>
                <?php the_post_thumbnail('card-fullwidth', ['class' => 'projectCard__card__img no-filter']); ?>
            <?php else : ?>
                <?php the_post_thumbnail('thumbnail', ['class' => 'projectCard__card__img no-filter']); ?>
            <?php endif; ?>
        <?php elseif ($is_portrait && wp_is_mobile() === false) : ?>
            <?php the_post_thumbnail('thumbnail', ['class' => 'projectCard__card__img', 'id' => 'img--' . $i]); ?>
        <?php else : ?>
            <?php the_post_thumbnail('card-fullwidth', ['class' => 'projectCard__card__img', 'id' => 'img--' . $i]); ?>
        <?php endif; ?>
    </div>

    <a id="card--<?= $i ?>" class="projectCard__hover" href="<?php the_permalink() ?>">
        <p class="projectCard__hover__title"><?php the_title() ?></p>
    </a>
</div>