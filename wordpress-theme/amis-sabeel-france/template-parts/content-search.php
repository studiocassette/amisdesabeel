<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

$post_type = get_post_type();
$category = '';
$category_label = '';

if ($post_type === 'document') {
    $terms = get_the_terms(get_the_ID(), 'document_category');
    if ($terms && !is_wp_error($terms)) {
        $category = $terms[0]->slug;
        $category_label = $terms[0]->name;
    }
} elseif ($post_type === 'prayer') {
    $category = 'prieres';
    $category_label = __('Vagues de prieres', 'amis-sabeel');
} elseif ($post_type === 'page') {
    $category_label = __('Page', 'amis-sabeel');
} elseif ($post_type === 'post') {
    $categories = get_the_category();
    if ($categories) {
        $category_label = $categories[0]->name;
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="article-card-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('article-thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="article-card-content">
        <div class="article-card-meta">
            <?php if ($category_label) : ?>
                <span class="category-badge <?php echo esc_attr($category ? amis_sabeel_get_category_badge_class($category) : 'category-badge-sabeel'); ?>">
                    <?php echo esc_html($category_label); ?>
                </span>
            <?php endif; ?>
            <span class="article-card-date"><?php echo esc_html(get_the_date()); ?></span>
        </div>

        <h3 class="article-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <p class="article-card-excerpt">
            <?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt(), 120)); ?>
        </p>
    </div>
</article>
