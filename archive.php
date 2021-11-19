<?php get_header(); ?>

<?php require_once('inc/archive-url.php'); ?>

<div class="archive__nav">
    <?php $domains = get_terms(['taxonomy' => 'domain']); ?>
    <ul class="nav">
        <li class="nav__item">
            <a href="<?= write_all_url('domain'); ?>" class="link <?= isset($_GET['domain']) ? '' : 'active' ?>">Tous</a>
        </li>
        <?php foreach ($domains as $domain) : ?>
            <li class="nav__item">
                <a href="<?= write_tax_url($domain); ?>" class="link <?= $_GET['domain'] === $domain->slug ? 'active' : '' ?>"><?= $domain->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $skills = get_terms(['taxonomy' => 'skill']); ?>
    <ul class="nav">
        <li class="nav__item">
            <a href="<?= write_all_url('skill'); ?>" class="link <?= isset($_GET['skill']) ? '' : 'active' ?>">Tous</a>
        </li>
        <?php foreach ($skills as $skill) : ?>
            <li class="nav__item">
                <a href="<?= write_tax_url($skill); ?>" class="link <?= $_GET['skill'] === $skill->slug ? 'active' : '' ?>"><?= $skill->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php if (have_posts()) : ?>
    <div class="projectGrid">
        <?php $i = 1; ?>
        <?php while (have_posts()) : the_post() ?>
            <?= in_array($i, [2, 5, 10]) ? '<div class="projectGrid__double">' : '' ?>
            <?= $i % 4 === 0 ? '</div>' : '' ?>
            <?php get_template_part('template-parts/project/project-card', null, ['inc' => $i]); ?>
            <?php $i++; ?>
        <?php endwhile; ?>
        <?= paginate_links(); ?>
    </div>
<?php else : ?>
    <p>Rien à voir pour le moment...</p>
<?php endif; ?>

<?php get_footer(); ?>