<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

function amis_sabeel_default_menu() {
    $menu_items = array(
        array('title' => __('Accueil', 'amis-sabeel'), 'url' => home_url('/')),
        array('title' => __('Documents Sabeel', 'amis-sabeel'), 'url' => home_url('/documents-sabeel')),
        array('title' => __('Kairos', 'amis-sabeel'), 'url' => home_url('/kairos')),
        array('title' => __('Publications', 'amis-sabeel'), 'url' => home_url('/publications')),
        array('title' => __('Vagues de prieres', 'amis-sabeel'), 'url' => home_url('/vagues-de-prieres')),
        array('title' => __('Partenaires', 'amis-sabeel'), 'url' => home_url('/partenaires')),
        array('title' => __('Contact', 'amis-sabeel'), 'url' => home_url('/contact')),
    );

    $current_url = home_url($_SERVER['REQUEST_URI']);

    foreach ($menu_items as $item) {
        $active_class = ($current_url === $item['url']) ? ' active' : '';
        echo '<a href="' . esc_url($item['url']) . '" class="' . esc_attr($active_class) . '">' . esc_html($item['title']) . '</a>';
    }
}

function amis_sabeel_post_thumbnail($size = 'article-thumbnail') {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }
    ?>
    <div class="post-thumbnail">
        <?php if (is_singular()) : ?>
            <?php the_post_thumbnail($size); ?>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    $size,
                    array(
                        'alt' => the_title_attribute(array('echo' => false)),
                    )
                );
                ?>
            </a>
        <?php endif; ?>
    </div>
    <?php
}

function amis_sabeel_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

function amis_sabeel_posted_by() {
    echo '<span class="byline">';
    printf(
        esc_html_x('par %s', 'post author', 'amis-sabeel'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
    echo '</span>';
}

function amis_sabeel_entry_footer() {
    if ('post' === get_post_type()) {
        $categories_list = get_the_category_list(esc_html__(', ', 'amis-sabeel'));
        if ($categories_list) {
            printf('<span class="cat-links">' . esc_html__('Categories: %1$s', 'amis-sabeel') . '</span>', $categories_list);
        }

        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'amis-sabeel'));
        if ($tags_list) {
            printf('<span class="tags-links">' . esc_html__('Tags: %1$s', 'amis-sabeel') . '</span>', $tags_list);
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    __('Laisser un commentaire<span class="sr-only"> sur %s</span>', 'amis-sabeel'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                __('Modifier <span class="sr-only">%s</span>', 'amis-sabeel'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

function amis_sabeel_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_year()) {
        $title = get_the_date(_x('Y', 'yearly archives date format', 'amis-sabeel'));
    } elseif (is_month()) {
        $title = get_the_date(_x('F Y', 'monthly archives date format', 'amis-sabeel'));
    } elseif (is_day()) {
        $title = get_the_date(_x('j F Y', 'daily archives date format', 'amis-sabeel'));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
}
add_filter('get_the_archive_title', 'amis_sabeel_archive_title');

function amis_sabeel_get_social_links() {
    $social_networks = array('facebook', 'twitter', 'youtube', 'instagram');
    $links = array();

    foreach ($social_networks as $network) {
        $url = get_theme_mod('amis_sabeel_social_' . $network, '');
        if (!empty($url)) {
            $links[$network] = $url;
        }
    }

    return $links;
}

function amis_sabeel_social_icons() {
    $links = amis_sabeel_get_social_links();

    if (empty($links)) {
        return;
    }

    $icons = array(
        'facebook'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
        'twitter'   => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg>',
        'youtube'   => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>',
    );

    echo '<div class="social-links">';
    foreach ($links as $network => $url) {
        echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr(ucfirst($network)) . '">';
        echo $icons[$network];
        echo '</a>';
    }
    echo '</div>';
}

function amis_sabeel_reading_time($content = '') {
    if (empty($content)) {
        $content = get_the_content();
    }

    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);

    return sprintf(
        _n('%d min de lecture', '%d min de lecture', $reading_time, 'amis-sabeel'),
        $reading_time
    );
}
