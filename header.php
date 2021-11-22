<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body class="body">
    <header class="header">
        <nav class="navbar">
            <a class="navbar-brand" href="<?= get_home_url() ?>">Guillaume<br />Marteau</a>

            <label class="toggler" for="navToggler">
                <input class="toggler__checkbox" type="checkbox" id="navToggler"/> 
                <span class="toggler__bar"></span>
                <span class="toggler__bar"></span>
                <span class="toggler__bar"></span>
            </label>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="border: solid 2px black;"></span>
            </button>
            <div class="" id="navbarNav">
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'headerNav'
                ])
                ?>
            </div>
        </nav>
    </header>

    <main class="main">