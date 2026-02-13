<?php
/**
 * Template part for displaying document posts
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

$terms = get_the_terms(get_the_ID(), 'document_category');
$category = $terms && !is_wp_error($terms) ? $terms[0]->slug : 'sabeel';
$category_label = $terms && !is_wp_error($terms) ? $terms[0]->name : __('Document', 'amis-sabeel');

$type_terms = get_the_terms(get_the_ID(), 'document_type');
$type_label = $type_terms && !is_wp_error($type_terms) ? $type_terms[0]->name : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?> data-category="<?php echo esc_attr($category); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <div class="article-card-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('article-thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="article-card-content">
        <div class="article-card-meta">
            <span class="category-badge <?php echo esc_attr(amis_sabeel_get_category_badge_class($category)); ?>">
                <?php echo esc_html($category_label); ?>
            </span>
            <span class="article-card-date"><?php echo esc_html(get_the_date()); ?></span>
        </div>

        <h3 class="article-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ($type_label) : ?>
            <p class="text-xs text-muted-foreground mb-2"><?php echo esc_html($type_label); ?></p>
        <?php endif; ?>

        <?php if (has_excerpt() || get_the_content()) : ?>
            <p class="article-card-excerpt">
                <?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt(), 120)); ?>
            </p>
        <?php endif; ?>
    </div>
</article>
