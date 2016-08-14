<?php

include("library/CustomOption.php");
if (is_admin()) {
    $CustomOption = new CustomOption('social-sharing', "Redes Sociais", "social-sharing");
    $CustomOption->addField("youtube", "Youtube", "text");
    $CustomOption->addField("instagram", "Instagram", "text");
    $CustomOption->addField("linkedin", "Linkedin", "text");
    $CustomOption->addField("facebook", "Facebook", "text");
    $CustomOption->addField("twitter", "Twitter", "text");
    $CustomOption->run();

    $CustomOption = new CustomOption('contacts', "Contatos", "contacts");
    $CustomOption->addField("telefone", "Telefone", "text");
    $CustomOption->addField("email", "Email", "text");
    $CustomOption->addField("endereco", "Endereço", "text");
    $CustomOption->addField("mapa", "Google Maps", "text");
    $CustomOption->run();
}

add_theme_support('post-thumbnails');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1000, 300, true);
    add_image_size('img-banner-home', 1600, 600, true);
    add_image_size('img-banner-int', 1600, 500, true);
    add_image_size('img-our-people', 200, 200, true);
    add_image_size('img-case-project', 400, 300, true);
    add_image_size('img-solutions', 400, 250, true);
    add_image_size('img-architecture', 300, 300, true);
    add_image_size('img-projects', 800, 600, true);
    add_image_size('img-posts-featured', 800, 800, true);
    add_image_size('img-posts', 800, 400, true);
    add_image_size('img-author', 150, 150, true);
    add_image_size('img-logo', 150, 150, true);
    add_image_size('img-home', 600, 250, true);
}

//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
        wp_enqueue_script('jquery');
    }
}

add_action('init', 'modify_jquery');


if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function register_main_menus() {
    register_nav_menus(
            array(
                'primary-menu' => __('Primary Menu'),
                'footer-menu' => __('Footer Menu'),
            )
    );
}

;


if (function_exists('register_nav_menus'))
    add_action('init', 'register_main_menus');

function excerpt($limit) {

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

function limited($limit, $text) {

    $excerpt = explode(' ', strip_tags($text), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

//attach our function to the wp_pagenavi filter
add_filter('wp_pagenavi', 'ik_pagination', 10, 2);

//customize the PageNavi HTML before it is output
function ik_pagination($html) {
    $out = '';

    //wrap a's and span's in li's
    $out = str_replace("<div", "", $html);
    $out = str_replace("class='wp-pagenavi'>", "", $out);
    $out = str_replace("<a", "<li><a", $out);
    $out = str_replace("</a>", "</a></li>", $out);
    $out = str_replace("<span", "<li><span", $out);
    $out = str_replace("</span>", "</span></li>", $out);
    $out = str_replace("</div>", "", $out);
    /* 	$out = str_replace("»",'<img src="'.get_bloginfo('template_directory').'/images/icon-right-pagination.png" alt="">',$out);
      $out = str_replace("«",'<img src="'.get_bloginfo('template_directory').'/images/icon-left-pagination.png" alt="">',$out);
      $out = str_replace("<li><span class='current'>","<li class='active'><span>",$out); */

    return '<ul class="pagination pagination-centered">' . $out . '</ul>';
}

function namespace_add_custom_types($query) {
    if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
        $query->set('post_type', array(
            'post', 'nav_menu_item', 'secao_noticias'
        ));
        return $query;
    }
}

add_filter('pre_get_posts', 'namespace_add_custom_types');

/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join($join) {
    global $wpdb;

    if (is_search()) {
        $join .=' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}

add_filter('posts_join', 'cf_search_join');

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where($where) {
    global $pagenow, $wpdb;

    if (is_search()) {
        $where = preg_replace(
                "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/", "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where);
    }

    return $where;
}

add_filter('posts_where', 'cf_search_where');

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct($where) {
    global $wpdb;

    if (is_search()) {
        return "DISTINCT";
    }

    return $where;
}

add_filter('posts_distinct', 'cf_search_distinct');

function sh_the_content_by_id($post_id = 0, $more_link_text = null, $stripteaser = false) {
    global $post;
    $post = &get_post($post_id);
    setup_postdata($post, $more_link_text, $stripteaser);
    the_content();
    wp_reset_postdata($post);
}

function tabChild($parentid) {
    $cont = 0;

    $mypages = get_pages(array('child_of' => $parentid, 'parent' => -1, 'sort_column' => 'menu_order'));

    foreach ($mypages as $page) {
        if ($page->post_parent == $parentid) {
            $tab_data['title'][$cont] = $page->post_title;
            $tab_data['id'][$cont] = $page->ID;
            $tab_data['slug'][$cont] = $page->post_name;
        }
        $cont++;
    }
    return $tab_data;
}

function sluged($text) {
    $map = array(
        'á' => 'a',
        'à' => 'a',
        'ã' => 'a',
        'â' => 'a',
        '&' => 'e',
        'é' => 'e',
        'ê' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ú' => 'u',
        'ü' => 'u',
        'ç' => 'c',
        'Á' => 'A',
        'À' => 'A',
        'Ã' => 'A',
        'Â' => 'A',
        'É' => 'E',
        'Ê' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ô' => 'O',
        'Õ' => 'O',
        'Ú' => 'U',
        'Ü' => 'U',
        'Ç' => 'C'
    );

    $text = strtr($text, $map);
    $text = strtolower($text);
    $text = str_replace(",", "", $text);
    $text = str_replace(" ", "-", $text);

    return $text;
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"animenu__nav__child\">\n";
    }

}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );