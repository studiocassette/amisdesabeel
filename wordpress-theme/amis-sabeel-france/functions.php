<?php
/**
 * Amis de Sabeel France functions and definitions
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('AMIS_SABEEL_VERSION', '1.0.0');
define('AMIS_SABEEL_DIR', get_template_directory());
define('AMIS_SABEEL_URI', get_template_directory_uri());

function amis_sabeel_setup() {
    load_theme_textdomain('amis-sabeel', AMIS_SABEEL_DIR . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    add_image_size('article-thumbnail', 600, 400, true);
    add_image_size('article-large', 1200, 675, true);
    add_image_size('hero-image', 1920, 800, true);

    register_nav_menus(array(
        'primary'   => esc_html__('Menu principal', 'amis-sabeel'),
        'footer'    => esc_html__('Menu pied de page', 'amis-sabeel'),
        'footer-about' => esc_html__('Menu A propos', 'amis-sabeel'),
        'footer-legal' => esc_html__('Menu Legal', 'amis-sabeel'),
    ));
}
add_action('after_setup_theme', 'amis_sabeel_setup');

function amis_sabeel_content_width() {
    $GLOBALS['content_width'] = apply_filters('amis_sabeel_content_width', 1200);
}
add_action('after_setup_theme', 'amis_sabeel_content_width', 0);

function amis_sabeel_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'amis-sabeel'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Ajoutez des widgets ici.', 'amis-sabeel'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Colonne 1', 'amis-sabeel'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Widgets pour le pied de page, colonne 1.', 'amis-sabeel'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Colonne 2', 'amis-sabeel'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Widgets pour le pied de page, colonne 2.', 'amis-sabeel'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'amis_sabeel_widgets_init');

function amis_sabeel_scripts() {
    wp_enqueue_style(
        'amis-sabeel-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'amis-sabeel-style',
        get_stylesheet_uri(),
        array(),
        AMIS_SABEEL_VERSION
    );

    wp_enqueue_script(
        'amis-sabeel-navigation',
        AMIS_SABEEL_URI . '/assets/js/navigation.js',
        array(),
        AMIS_SABEEL_VERSION,
        true
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'amis_sabeel_scripts');

function amis_sabeel_register_post_types() {
    register_post_type('document', array(
        'labels' => array(
            'name'               => __('Documents', 'amis-sabeel'),
            'singular_name'      => __('Document', 'amis-sabeel'),
            'add_new'            => __('Ajouter', 'amis-sabeel'),
            'add_new_item'       => __('Ajouter un document', 'amis-sabeel'),
            'edit_item'          => __('Modifier le document', 'amis-sabeel'),
            'new_item'           => __('Nouveau document', 'amis-sabeel'),
            'view_item'          => __('Voir le document', 'amis-sabeel'),
            'search_items'       => __('Rechercher des documents', 'amis-sabeel'),
            'not_found'          => __('Aucun document trouve', 'amis-sabeel'),
            'not_found_in_trash' => __('Aucun document dans la corbeille', 'amis-sabeel'),
            'menu_name'          => __('Documents', 'amis-sabeel'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'documents'),
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-media-document',
        'show_in_rest'        => true,
    ));

    register_post_type('prayer', array(
        'labels' => array(
            'name'               => __('Vagues de prieres', 'amis-sabeel'),
            'singular_name'      => __('Vague de priere', 'amis-sabeel'),
            'add_new'            => __('Ajouter', 'amis-sabeel'),
            'add_new_item'       => __('Ajouter une vague de priere', 'amis-sabeel'),
            'edit_item'          => __('Modifier la vague de priere', 'amis-sabeel'),
            'new_item'           => __('Nouvelle vague de priere', 'amis-sabeel'),
            'view_item'          => __('Voir la vague de priere', 'amis-sabeel'),
            'search_items'       => __('Rechercher des vagues de prieres', 'amis-sabeel'),
            'not_found'          => __('Aucune vague de priere trouvee', 'amis-sabeel'),
            'not_found_in_trash' => __('Aucune vague de priere dans la corbeille', 'amis-sabeel'),
            'menu_name'          => __('Vagues de prieres', 'amis-sabeel'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'vagues-de-prieres'),
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-heart',
        'show_in_rest'        => true,
    ));

    register_post_type('partner', array(
        'labels' => array(
            'name'               => __('Partenaires', 'amis-sabeel'),
            'singular_name'      => __('Partenaire', 'amis-sabeel'),
            'add_new'            => __('Ajouter', 'amis-sabeel'),
            'add_new_item'       => __('Ajouter un partenaire', 'amis-sabeel'),
            'edit_item'          => __('Modifier le partenaire', 'amis-sabeel'),
            'new_item'           => __('Nouveau partenaire', 'amis-sabeel'),
            'view_item'          => __('Voir le partenaire', 'amis-sabeel'),
            'search_items'       => __('Rechercher des partenaires', 'amis-sabeel'),
            'not_found'          => __('Aucun partenaire trouve', 'amis-sabeel'),
            'not_found_in_trash' => __('Aucun partenaire dans la corbeille', 'amis-sabeel'),
            'menu_name'          => __('Partenaires', 'amis-sabeel'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'partenaires'),
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-groups',
        'show_in_rest'        => true,
    ));
}
add_action('init', 'amis_sabeel_register_post_types');

function amis_sabeel_register_taxonomies() {
    register_taxonomy('document_category', 'document', array(
        'labels' => array(
            'name'              => __('Categories de documents', 'amis-sabeel'),
            'singular_name'     => __('Categorie de document', 'amis-sabeel'),
            'search_items'      => __('Rechercher des categories', 'amis-sabeel'),
            'all_items'         => __('Toutes les categories', 'amis-sabeel'),
            'parent_item'       => __('Categorie parente', 'amis-sabeel'),
            'parent_item_colon' => __('Categorie parente:', 'amis-sabeel'),
            'edit_item'         => __('Modifier la categorie', 'amis-sabeel'),
            'update_item'       => __('Mettre a jour la categorie', 'amis-sabeel'),
            'add_new_item'      => __('Ajouter une categorie', 'amis-sabeel'),
            'new_item_name'     => __('Nom de la nouvelle categorie', 'amis-sabeel'),
            'menu_name'         => __('Categories', 'amis-sabeel'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'categorie-document'),
        'show_in_rest'      => true,
    ));

    register_taxonomy('document_type', 'document', array(
        'labels' => array(
            'name'              => __('Types de documents', 'amis-sabeel'),
            'singular_name'     => __('Type de document', 'amis-sabeel'),
            'search_items'      => __('Rechercher des types', 'amis-sabeel'),
            'all_items'         => __('Tous les types', 'amis-sabeel'),
            'edit_item'         => __('Modifier le type', 'amis-sabeel'),
            'update_item'       => __('Mettre a jour le type', 'amis-sabeel'),
            'add_new_item'      => __('Ajouter un type', 'amis-sabeel'),
            'new_item_name'     => __('Nom du nouveau type', 'amis-sabeel'),
            'menu_name'         => __('Types', 'amis-sabeel'),
        ),
        'hierarchical'      => false,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'type-document'),
        'show_in_rest'      => true,
    ));

    register_taxonomy('partner_type', 'partner', array(
        'labels' => array(
            'name'              => __('Types de partenaires', 'amis-sabeel'),
            'singular_name'     => __('Type de partenaire', 'amis-sabeel'),
            'search_items'      => __('Rechercher des types', 'amis-sabeel'),
            'all_items'         => __('Tous les types', 'amis-sabeel'),
            'edit_item'         => __('Modifier le type', 'amis-sabeel'),
            'update_item'       => __('Mettre a jour le type', 'amis-sabeel'),
            'add_new_item'      => __('Ajouter un type', 'amis-sabeel'),
            'new_item_name'     => __('Nom du nouveau type', 'amis-sabeel'),
            'menu_name'         => __('Types', 'amis-sabeel'),
        ),
        'hierarchical'      => false,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'type-partenaire'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'amis_sabeel_register_taxonomies');

function amis_sabeel_get_category_badge_class($category) {
    $classes = array(
        'sabeel'       => 'category-badge-sabeel',
        'kairos'       => 'category-badge-kairos',
        'publications' => 'category-badge-publications',
        'prieres'      => 'category-badge-prieres',
        'videos'       => 'category-badge-videos',
        'cornerstone'  => 'category-badge-cornerstone',
    );
    return isset($classes[$category]) ? $classes[$category] : 'category-badge-sabeel';
}

function amis_sabeel_get_category_label($category) {
    $labels = array(
        'sabeel'       => __('Documents Sabeel', 'amis-sabeel'),
        'kairos'       => __('Kairos', 'amis-sabeel'),
        'publications' => __('Publications', 'amis-sabeel'),
        'prieres'      => __('Vagues de prieres', 'amis-sabeel'),
        'videos'       => __('Videos', 'amis-sabeel'),
        'cornerstone'  => __('Cornerstone', 'amis-sabeel'),
    );
    return isset($labels[$category]) ? $labels[$category] : $category;
}

function amis_sabeel_get_current_prayer() {
    $prayers = get_posts(array(
        'post_type'      => 'prayer',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));
    return !empty($prayers) ? $prayers[0] : null;
}

function amis_sabeel_get_recent_documents($count = 6, $category = '') {
    $args = array(
        'post_type'      => 'document',
        'posts_per_page' => $count,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'document_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    return get_posts($args);
}

function amis_sabeel_format_date($date) {
    return date_i18n(get_option('date_format'), strtotime($date));
}

function amis_sabeel_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'amis_sabeel_excerpt_length');

function amis_sabeel_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'amis_sabeel_excerpt_more');

function amis_sabeel_custom_excerpt($text, $length = 150) {
    if (strlen($text) <= $length) {
        return $text;
    }
    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, ' '));
    return $text . '...';
}

function amis_sabeel_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'amis_sabeel_body_classes');

function amis_sabeel_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'amis_sabeel_pingback_header');

require_once AMIS_SABEEL_DIR . '/inc/customizer.php';
require_once AMIS_SABEEL_DIR . '/inc/template-functions.php';

function amis_sabeel_newsletter_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'placeholder' => __('Votre adresse email', 'amis-sabeel'),
        'button_text' => __("S'inscrire", 'amis-sabeel'),
    ), $atts);

    ob_start();
    ?>
    <form class="newsletter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <input type="hidden" name="action" value="newsletter_subscribe">
        <?php wp_nonce_field('newsletter_subscribe_nonce', 'newsletter_nonce'); ?>
        <input type="email" name="email" placeholder="<?php echo esc_attr($atts['placeholder']); ?>" required>
        <button type="submit" class="btn btn-primary"><?php echo esc_html($atts['button_text']); ?></button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('newsletter_form', 'amis_sabeel_newsletter_form_shortcode');

function amis_sabeel_add_default_categories() {
    $categories = array(
        array('slug' => 'sabeel', 'name' => 'Documents Sabeel'),
        array('slug' => 'kairos', 'name' => 'Kairos'),
        array('slug' => 'publications', 'name' => 'Publications'),
        array('slug' => 'videos', 'name' => 'Videos'),
    );

    foreach ($categories as $cat) {
        if (!term_exists($cat['slug'], 'document_category')) {
            wp_insert_term($cat['name'], 'document_category', array('slug' => $cat['slug']));
        }
    }

    $partner_types = array(
        array('slug' => 'international', 'name' => 'International'),
        array('slug' => 'french', 'name' => 'France'),
        array('slug' => 'european', 'name' => 'Europe'),
    );

    foreach ($partner_types as $type) {
        if (!term_exists($type['slug'], 'partner_type')) {
            wp_insert_term($type['name'], 'partner_type', array('slug' => $type['slug']));
        }
    }
}
add_action('after_switch_theme', 'amis_sabeel_add_default_categories');

function amis_sabeel_flush_rewrite_rules() {
    amis_sabeel_register_post_types();
    amis_sabeel_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'amis_sabeel_flush_rewrite_rules');
