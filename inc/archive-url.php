<?php

/**
 * Writes the URL for the <a> corresponding to the taxonomy value in function of the current URL
 */
function write_tax_url(WP_Term $term): string
{
    $current_url = $_SERVER['REQUEST_URI'];
    $url_separator = str_contains($current_url, '?') ? '&' : '?';
    if (isset($_GET[$term->taxonomy])) {
        $old_query = $_GET[$term->taxonomy];
        $new_url = str_replace($old_query, $term->slug, $current_url);
        return $new_url;
    } else {
        $new_url = $current_url . $url_separator . $term->taxonomy . '=' . $term->slug;
        return $new_url;
    }
}


/**
 * Writes the URL for the <a> corresponding to all values of the taxonomy given in arg in function of the current URL
 */
function write_all_url(string $tax): string
{
    $current_url = $_SERVER['REQUEST_URI'];
    if (isset($_GET[$tax])) {
        $is_first_param_of_many = str_contains($current_url, '?' . $tax . '=' . $_GET[$tax] . '&');
        $is_only_param = str_contains($current_url, '?' . $tax);
        $is_second_param = str_contains($current_url, '&' . $tax);
        if ($is_first_param_of_many) {
            $to_unset = $tax . '=' . $_GET[$tax] . '&';
            return str_replace($to_unset, '', $current_url);
        } elseif ($is_only_param) {
            $to_unset = '?' . $tax . '=' . $_GET[$tax];
            return str_replace($to_unset, '', $current_url);
        } elseif ($is_second_param) {
            $to_unset = '&' . $tax . '=' . $_GET[$tax];
            return str_replace($to_unset, '', $current_url);
        } else {
            return $current_url;
        }
    } else {
        return $current_url;
    }
}
