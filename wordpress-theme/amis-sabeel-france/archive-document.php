<?php
/**
 * The template for displaying document archive pages
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();

$queried_object = get_queried_object();
$current_category = '';

if (is_tax('document_category')) {
    $current_category = $queried_object->slug;
}
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <nav class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'amis-sabeel'); ?></a>
                <span class="breadcrumb-separator">/</span>
                <?php if (is_tax('document_category')) : ?>
                    <a href="<?php echo esc_url(get_post_type_archive_link('document')); ?>"><?php esc_html_e('Documents', 'amis-sabeel'); ?></a>
                    <span class="breadcrumb-separator">/</span>
                    <span><?php single_term_title(); ?></span>
                <?php else : ?>
                    <span><?php esc_html_e('Documents', 'amis-sabeel'); ?></span>
                <?php endif; ?>
            </nav>

            <?php if (is_tax('document_category')) : ?>
                <span class="category-badge <?php echo esc_attr(amis_sabeel_get_category_badge_class($current_category)); ?> mb-4">
                    <?php single_term_title(); ?>
                </span>
            <?php endif; ?>

            <h1 class="page-title">
                <?php
                if (is_tax('document_category')) {
                    single_term_title();
                } else {
                    esc_html_e('Tous les documents', 'amis-sabeel');
                }
                ?>
            </h1>

            <?php if (is_tax('document_category') && term_description()) : ?>
                <p class="page-description"><?php echo wp_kses_post(term_description()); ?></p>
            <?php else : ?>
                <p class="page-description"><?php esc_html_e('Explorez notre collection de documents sur la Palestine et la theologie de la liberation.', 'amis-sabeel'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <?php if (!is_tax('document_category')) : ?>
                <div class="category-filters mb-8">
                    <a href="<?php echo esc_url(get_post_type_archive_link('document')); ?>" class="filter-btn <?php echo !$current_category ? 'active' : ''; ?>">
                        <?php esc_html_e('Tous', 'amis-sabeel'); ?>
                    </a>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy'   => 'document_category',
                        'hide_empty' => true,
                    ));

                    if ($categories && !is_wp_error($categories)) :
                        foreach ($categories as $category) :
                            ?>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="filter-btn <?php echo $current_category === $category->slug ? 'active' : ''; ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <div class="articles-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'document');
                    endwhile;
                    ?>
                </div>

                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>',
                    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>',
                ));
                ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
