<?php
/**
 * Template part for displaying partner posts
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

$type_terms = get_the_terms(get_the_ID(), 'partner_type');
$type_label = $type_terms && !is_wp_error($type_terms) ? $type_terms[0]->name : '';

$website = get_post_meta(get_the_ID(), 'partner_website', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('partner-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="partner-card-logo">
            <?php the_post_thumbnail('thumbnail'); ?>
        </div>
    <?php endif; ?>

    <h3 class="partner-card-name"><?php the_title(); ?></h3>

    <?php if (has_excerpt() || get_the_content()) : ?>
        <p class="partner-card-description">
            <?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt(), 150)); ?>
        </p>
    <?php endif; ?>

    <?php if ($website) : ?>
        <a href="<?php echo esc_url($website); ?>" class="partner-card-link" target="_blank" rel="noopener noreferrer">
            <?php esc_html_e('Visiter le site', 'amis-sabeel'); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" x2="21" y1="14" y2="3"></line>
            </svg>
        </a>
    <?php endif; ?>
</article>
