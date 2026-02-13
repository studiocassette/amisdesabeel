<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */
?>

<div class="no-results">
    <h2 class="no-results-title">
        <?php
        if (is_search()) {
            esc_html_e('Aucun resultat', 'amis-sabeel');
        } else {
            esc_html_e('Aucun contenu', 'amis-sabeel');
        }
        ?>
    </h2>

    <p class="no-results-description">
        <?php
        if (is_home() && current_user_can('publish_posts')) {
            printf(
                wp_kses(
                    __('Pret a publier votre premier article ? <a href="%1$s">Commencer ici</a>.', 'amis-sabeel'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ),
                esc_url(admin_url('post-new.php'))
            );
        } elseif (is_search()) {
            esc_html_e('Desolee, aucun contenu ne correspond a votre recherche. Essayez avec d\'autres mots-cles.', 'amis-sabeel');
        } else {
            esc_html_e('Il semble que nous ne trouvons pas ce que vous cherchez. Peut-etre qu\'une recherche peut vous aider.', 'amis-sabeel');
        }
        ?>
    </p>

    <?php if (is_search()) : ?>
        <div class="mt-6">
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>
