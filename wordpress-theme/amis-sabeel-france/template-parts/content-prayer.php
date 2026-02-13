<?php
/**
 * Template part for displaying prayer posts
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?> data-category="prieres">
    <?php if (has_post_thumbnail()) : ?>
        <div class="article-card-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('article-thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="article-card-content">
        <div class="article-card-meta">
            <span class="category-badge category-badge-prieres">
                <?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?>
            </span>
            <span class="article-card-date"><?php echo esc_html(get_the_date()); ?></span>
        </div>

        <h3 class="article-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if (has_excerpt() || get_the_content()) : ?>
            <p class="article-card-excerpt">
                <?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt(), 120)); ?>
            </p>
        <?php endif; ?>
    </div>
</article>
