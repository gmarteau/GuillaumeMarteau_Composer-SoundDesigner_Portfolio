<?php

function gmarteau_composer_support()
{
    add_theme_support('title-tag');
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

add_action('after_setup_theme', 'gmarteau_composer_support');
add_action('wp_enqueue_scripts', 'gmarteau_composer_register_assets');

add_filter('document_title_separator', 'gmarteau_composer_title_separator');
