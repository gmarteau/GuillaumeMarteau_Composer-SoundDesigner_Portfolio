<?php require_once('inc/archive-url.php'); ?>

<?php get_header(); ?>

<div class="row">
    <h1 class="col">Voici ce que je fais</h1>
</div>

<?php $domains = get_terms(['taxonomy' => 'domain']); ?>
<div class="row">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="<?= write_all_url('domain'); ?>" class="nav-link <?= isset($_GET['domain']) ? '' : 'active' ?>">Tous</a>
        </li>
        <?php foreach ($domains as $domain) : ?>
            <li class="nav-item">
                <a href="<?= write_tax_url($domain); ?>" class="nav-link <?= $_GET['domain'] === $domain->slug ? 'active' : '' ?>"><?= $domain->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php $skills = get_terms(['taxonomy' => 'skill']); ?>
<div class="row">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="<?= write_all_url('skill'); ?>" class="nav-link <?= isset($_GET['skill']) ? '' : 'active' ?>">Tous</a>
        </li>
        <?php foreach ($skills as $skill) : ?>
            <li class="nav-item">
                <a href="<?= write_tax_url($skill); ?>" class="nav-link <?= $_GET['skill'] === $skill->slug ? 'active' : '' ?>"><?= $skill->name; ?></a>
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