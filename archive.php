<?php get_header(); ?>

<?php require_once('inc/archive-url.php'); ?>

<div class="archive__nav">
    <?php $domains = get_terms(['taxonomy' => 'domain']); ?>
    <ul class="nav">
        <li class="nav__item">
            <a href="<?= write_all_url('domain'); ?>" class="link--upper <?= isset($_GET['domain']) ? '' : 'active' ?>">
                <?= strtoupper('tous'); ?>
            </a>
        </li>
        <?php foreach ($domains as $domain) : ?>
            <li class="nav__item">
                <a href="<?= write_tax_url($domain); ?>" class="link--upper <?= $_GET['domain'] === $domain->slug ? 'active' : '' ?>">
                    <?= strtoupper($domain->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $skills = get_terms(['taxonomy' => 'skill']); ?>
    <ul class="nav">
        <li class="nav__item">
            <a href="<?= write_all_url('skill'); ?>" class="link--upper <?= isset($_GET['skill']) ? '' : 'active' ?>">
                <?= strtoupper('tous'); ?>
            </a>
        </li>
        <?php foreach ($skills as $skill) : ?>
            <li class="nav__item">
                <a href="<?= write_tax_url($skill); ?>" class="link--upper <?= $_GET['skill'] === $skill->slug ? 'active' : '' ?>">
                    <?= strtoupper($skill->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php if (have_posts()) : ?>
    <div class="projectGrid">
        <?php $i = 1; ?>
        <?php while (have_posts()) : the_post() ?>
            <?= in_array($i, [2, 5, 10]) ? '<div class="projectGrid__double">' : '' ?>
            <?= in_array($i, [4, 7, 12]) ? '</div>' : '' ?>
            <?php get_template_part('template-parts/project/project-card', null, ['inc' => $i]); ?>
            <?php $i++; ?>
        <?php endwhile; ?>
        <?= paginate_links(); ?>
    </div>
<?php else : ?>
    <p>Rien à voir pour le moment...</p>
<?php endif; ?>

<?php get_footer(); ?>