<?php get_header(); ?>

<div class="row">
    <h1 class="col">Voici ce que je fais</h1>
</div>

<?php $domains = get_terms(['taxonomy' => 'domain']); ?>
<div class="row">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="<?= get_post_type_archive_link('project'); ?>" class="nav-link">Tous les projets</a>
        </li>
        <?php foreach ($domains as $domain) : ?>
            <li class="nav-item">
                <a href="<?= get_term_link($domain); ?>" class="nav-link"><?= $domain->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php $skills = get_terms(['taxonomy' => 'skill']); ?>
<div class="row">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="<?= get_post_type_archive_link('project'); ?>" class="nav-link">Tous les projets</a>
        </li>
        <?php foreach ($skills as $skill) : ?>
            <li class="nav-item">
                <a href="<?= get_term_link($skill); ?>" class="nav-link"><?= $skill->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post() ?>
            <div class="col-lg-4">
                <?php get_template_part('template-parts/project/project-card'); ?>
            </div>
        <?php endwhile; ?>
    </div>
    <?= paginate_links(); ?>
<?php else : ?>
    <div class="row">
        <p class="col">
            Rien à voir pour le moment...
        </p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>