<?php

function gmarteau_composer_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Header menu');
    register_nav_menu('social', 'Social menu');

    add_image_size('card-fullwidth', 1000, 300, true);
}

function gmarteau_composer_register_assets()
{
    wp_register_style('gfont-work-sans', 'https://fonts.googleapis.com/css2?family=Work+Sans&display=swap');
    wp_register_style('gmarteau-composer-style', get_template_directory_uri() . '/style.css', [], rand(111,9999), 'all');
    wp_register_script('jquery-min', 'https://code.jquery.com/jquery-3.6.0.min.js', [], false, true);
    wp_register_script('nav-toggle', get_template_directory_uri() . '/assets/js/nav-toggle.js', ['jquery-min'], false, true);
    wp_enqueue_style('gfont-work-sans');
    wp_enqueue_style('gmarteau-composer-style');
    wp_enqueue_script('nav-toggle');
    if (is_singular('project')) {
        wp_register_script('vimeo', 'https://player.vimeo.com/api/player.js', [], false, true);
        wp_enqueue_script('vimeo');
    }
    if (is_archive()) {
        wp_register_script('img-filter-hover', get_template_directory_uri() . '/assets/js/img-filter-hover.js', ['jquery-min'], false, true);
        wp_enqueue_script('img-filter-hover');
    }
}

function gmarteau_composer_title_separator(string $sep): string
{
    $sep = '|';
    return $sep;
}

function gmarteau_composer_init()
{
    register_taxonomy('domain', 'project', [
        'labels' => [
            'name' => 'Domaines',
            'singular_name' => 'Domaine',
            'plural_name' => 'Domaines',
            'search_items' => 'Rechercher des domaines',
            'all_items' => 'Tous les domaines',
            'edit_item' => 'Editer le domaine',
            'update_item' => 'Mettre à jour le domaine',
            'add_new_item' => 'Ajouter un nouveau domaine',
            'new_item_name' => 'Nouveau domaine',
            'menu_name' => 'Domaine',
            'not_found' => 'Pas de domaine trouvé'
        ],
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => [
            'slug' => 'domain'
        ]
    ]);
    register_taxonomy('skill', 'project', [
        'labels' => [
            'name' => 'Compétences',
            'singular_name' => 'Compétence',
            'plural_name' => 'Compétences',
            'search_items' => 'Rechercher des compétences',
            'all_items' => 'Toutes les compétences',
            'edit_item' => 'Editer la compétence',
            'update_item' => 'Mettre à jour la compétence',
            'add_new_item' => 'Ajouter une nouvelle compétence',
            'new_item_name' => 'Nouvelle compétence',
            'menu_name' => 'Compétence',
            'not_found' => 'Pas de compétence trouvée'
        ],
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => [
            'slug' => 'skill'
        ]
    ]);
    register_post_type('project', [
        'labels' => [
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'plural_name' => 'Projets',
            'search_items' => 'Rechercher des projets',
            'all_items' => 'Tous les projets',
            'edit_item' => 'Editer le projet',
            'update_item' => 'Mettre à jour le projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'new_item_name' => 'Nouveau projet',
            'menu_name' => 'Projet',
            'not_found' => 'Pas de projet trouvé'
        ],
        'description' => 'Projet de musique ou sound design',
        'taxonomies' => ['domain', 'skill'],
        'public' => true,
        'menu_position' => (int)4,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'portfolio'
        ]
    ]);
}


add_action('init', 'gmarteau_composer_init');
add_action('after_setup_theme', 'gmarteau_composer_support');
add_action('wp_enqueue_scripts', 'gmarteau_composer_register_assets');

add_filter('document_title_separator', 'gmarteau_composer_title_separator');