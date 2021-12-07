<!DOCTYPE html>
<html lang="fr-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body class="body">
    <div class="wrapper">
        <header class="header">
            <nav class="header__nav">
                <a class="header__nav__brand" href="<?= get_home_url() ?>">
                    <img src="<?= get_template_directory_uri() . '/assets/images/logo-01.png'; ?>" alt="Logo de Guillaume Marteau, ses deux initiales G et M sur fond coloré" class="header__nav__brand__img">
                </a>

                <div class="toggler">
                    <span class="toggler__bar"></span>
                    <span class="toggler__bar"></span>
                    <span class="toggler__bar"></span>
                </div>

                <div class="mainNav">
                    <ul class="mainNav__nav">
                        <?php
                        $items = wp_get_nav_menu_items('main-menu');
                        $current_url = is_archive() ? get_post_type_archive_link('project') : get_permalink();
                        foreach ($items as $item) :
                        ?>
                            <li class="mainNav__nav__item">
                                <a href="<?= $item->url ?>" class="link <?= $item->url === $current_url ? 'active' : ''; ?>">
                                    <?= $item->title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>                  
                    </ul>
                </div>
            </nav>
        </header>

        <main class="main">