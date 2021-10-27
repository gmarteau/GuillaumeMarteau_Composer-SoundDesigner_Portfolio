<?php

function gmarteau_composer_support()
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    register_nav_menu('header', 'Header menu');
}

function gmarteau_composer_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function gmarteau_composer_title_separator(string $sep): string
{
    $sep = '|';
    return $sep;
}

function gmarteau_composer_menu_css_class(array $classes): array
{
    $classes[] = 'nav-item';
    return $classes;
}

function gmarteau_composer_menu_link_attributes(array $atts): array
{
    $atts['class'] = 'nav-link';
    return $atts;
}


add_action('after_setup_theme', 'gmarteau_composer_support');
add_action('wp_enqueue_scripts', 'gmarteau_composer_register_assets');

add_filter('document_title_separator', 'gmarteau_composer_title_separator');
add_filter('nav_menu_css_class', 'gmarteau_composer_menu_css_class');
add_filter('nav_menu_link_attributes', 'gmarteau_composer_menu_link_attributes');
