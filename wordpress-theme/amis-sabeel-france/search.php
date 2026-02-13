<?php
/**
 * The template for displaying search results pages
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <nav class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'amis-sabeel'); ?></a>
                <span class="breadcrumb-separator">/</span>
                <span><?php esc_html_e('Recherche', 'amis-sabeel'); ?></span>
            </nav>
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Resultats de recherche pour : %s', 'amis-sabeel'),
                    '<span>"' . get_search_query() . '"</span>'
                );
                ?>
            </h1>
            <p class="page-description">
                <?php
                global $wp_query;
                printf(
                    _n('%d resultat trouve', '%d resultats trouves', $wp_query->found_posts, 'amis-sabeel'),
                    $wp_query->found_posts
                );
                ?>
            </p>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <div class="mb-8">
                <?php get_search_form(); ?>
            </div>

            <?php if (have_posts()) : ?>
                <div class="articles-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'search');
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
                <div class="no-results">
                    <h2 class="no-results-title"><?php esc_html_e('Aucun resultat', 'amis-sabeel'); ?></h2>
                    <p class="no-results-description">
                        <?php esc_html_e('Desolee, aucun contenu ne correspond a votre recherche. Essayez avec d\'autres mots-cles.', 'amis-sabeel'); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
