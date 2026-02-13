<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="not-found-page">
        <h1 class="not-found-title">404</h1>
        <h2 class="not-found-subtitle"><?php esc_html_e('Page non trouvee', 'amis-sabeel'); ?></h2>
        <p class="not-found-description">
            <?php esc_html_e('Desolee, la page que vous recherchez n\'existe pas ou a ete deplacee.', 'amis-sabeel'); ?>
        </p>
        <div class="mb-8">
            <?php get_search_form(); ?>
        </div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
            <?php esc_html_e('Retour a l\'accueil', 'amis-sabeel'); ?>
        </a>
    </div>
</main>

<?php
get_footer();
