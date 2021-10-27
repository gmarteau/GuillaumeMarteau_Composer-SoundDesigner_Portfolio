<a class="card" href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'style' => 'object-fit: cover;']); ?>
    <div class="card-body">
        <h3 class="card-title"><?php the_title() ?></h3>
        <p class="card-text"><?php the_excerpt() ?></p>
    </div>
</a>