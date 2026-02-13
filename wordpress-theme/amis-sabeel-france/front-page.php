<?php
/**
 * The template for the front page
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();

$current_prayer = amis_sabeel_get_current_prayer();
$recent_documents = amis_sabeel_get_recent_documents(6);
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(AMIS_SABEEL_URI . '/assets/images/logo.png'); ?>" alt="<?php esc_attr_e('Logo Sabeel - Source d\'eau vive', 'amis-sabeel'); ?>">
                    <?php endif; ?>
                </div>

                <h1 class="hero-title"><?php echo esc_html(get_theme_mod('amis_sabeel_hero_title', 'Amis de Sabeel France')); ?></h1>

                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('amis_sabeel_hero_description', 'Reseau de soutien au Centre oecumenique Sabeel, present a Jerusalem et Nazareth.')); ?>
                    <br>
                    <span class="highlight"><?php echo esc_html(get_theme_mod('amis_sabeel_hero_highlight', 'Developper des liens de solidarite avec les Eglises de Palestine-Israel')); ?></span>
                </p>

                <div class="hero-actions">
                    <a href="<?php echo esc_url(home_url('/documents')); ?>" class="btn btn-primary btn-lg">
                        <?php esc_html_e('Decouvrir nos documents', 'amis-sabeel'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(home_url('/qui-sommes-nous')); ?>" class="btn btn-outline btn-lg">
                        <?php esc_html_e('Qui sommes-nous ?', 'amis-sabeel'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vague de priere de la semaine -->
    <?php if ($current_prayer) : ?>
    <section class="section">
        <div class="container">
            <div class="prayer-card">
                <div class="prayer-card-content">
                    <div class="prayer-card-header">
                        <div>
                            <span class="category-badge category-badge-prieres"><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></span>
                            <h2 class="prayer-card-title"><?php esc_html_e('Vague de priere de la semaine', 'amis-sabeel'); ?></h2>
                        </div>
                        <div class="prayer-card-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <?php echo esc_html(get_the_date('', $current_prayer)); ?>
                        </div>
                    </div>
                    <h3 class="prayer-card-subtitle"><?php echo esc_html(get_the_title($current_prayer)); ?></h3>
                    <p class="prayer-card-excerpt"><?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt($current_prayer), 200)); ?></p>
                    <a href="<?php echo esc_url(get_permalink($current_prayer)); ?>" class="btn btn-primary">
                        <?php esc_html_e('Lire la priere complete', 'amis-sabeel'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Actualites recentes -->
    <section class="section section-alt">
        <div class="container">
            <div class="articles-header">
                <div class="section-header">
                    <h2 class="section-title"><?php esc_html_e('Actualites recentes', 'amis-sabeel'); ?></h2>
                    <p class="section-description"><?php esc_html_e('Nos dernieres publications et documents traduits', 'amis-sabeel'); ?></p>
                </div>

                <div class="category-filters">
                    <button class="filter-btn active" data-category="all"><?php esc_html_e('Tous', 'amis-sabeel'); ?></button>
                    <button class="filter-btn" data-category="sabeel"><?php esc_html_e('Documents Sabeel', 'amis-sabeel'); ?></button>
                    <button class="filter-btn" data-category="kairos"><?php esc_html_e('Kairos', 'amis-sabeel'); ?></button>
                    <button class="filter-btn" data-category="publications"><?php esc_html_e('Publications', 'amis-sabeel'); ?></button>
                    <button class="filter-btn" data-category="videos"><?php esc_html_e('Videos', 'amis-sabeel'); ?></button>
                </div>
            </div>

            <div class="articles-grid">
                <?php
                if ($recent_documents) :
                    foreach ($recent_documents as $document) :
                        $terms = get_the_terms($document->ID, 'document_category');
                        $category = $terms ? $terms[0]->slug : 'sabeel';
                        ?>
                        <article class="article-card" data-category="<?php echo esc_attr($category); ?>">
                            <?php if (has_post_thumbnail($document)) : ?>
                                <div class="article-card-image">
                                    <a href="<?php echo esc_url(get_permalink($document)); ?>">
                                        <?php echo get_the_post_thumbnail($document, 'article-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="article-card-content">
                                <div class="article-card-meta">
                                    <span class="category-badge <?php echo esc_attr(amis_sabeel_get_category_badge_class($category)); ?>">
                                        <?php echo esc_html(amis_sabeel_get_category_label($category)); ?>
                                    </span>
                                    <span class="article-card-date"><?php echo esc_html(get_the_date('', $document)); ?></span>
                                </div>
                                <h3 class="article-card-title">
                                    <a href="<?php echo esc_url(get_permalink($document)); ?>">
                                        <?php echo esc_html(get_the_title($document)); ?>
                                    </a>
                                </h3>
                                <p class="article-card-excerpt"><?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt($document), 120)); ?></p>
                            </div>
                        </article>
                        <?php
                    endforeach;
                else :
                    ?>
                    <div class="no-results" style="grid-column: 1 / -1;">
                        <p class="no-results-description"><?php esc_html_e('Aucun article dans cette categorie pour le moment.', 'amis-sabeel'); ?></p>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <div class="text-center mt-8">
                <a href="<?php echo esc_url(home_url('/documents')); ?>" class="btn btn-outline btn-lg">
                    <?php esc_html_e('Voir tous les documents', 'amis-sabeel'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Nos collections -->
    <section class="section">
        <div class="container">
            <div class="section-header text-center mb-8">
                <h2 class="section-title"><?php esc_html_e('Nos collections', 'amis-sabeel'); ?></h2>
                <p class="section-description"><?php esc_html_e('Explorez nos differentes ressources documentaires sur la Palestine et la theologie de la liberation', 'amis-sabeel'); ?></p>
            </div>

            <div class="collections-grid">
                <a href="<?php echo esc_url(home_url('/documents-sabeel')); ?>" class="collection-card">
                    <div class="collection-card-icon icon-sabeel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            <path d="M10 9H8"></path>
                            <path d="M16 13H8"></path>
                            <path d="M16 17H8"></path>
                        </svg>
                    </div>
                    <div class="collection-card-body">
                        <h3 class="collection-card-title"><?php esc_html_e('Documents Sabeel Jerusalem', 'amis-sabeel'); ?></h3>
                        <p class="collection-card-description"><?php esc_html_e('Traductions francaises des publications de Sabeel, centre oecumenique de theologie de la liberation en Palestine.', 'amis-sabeel'); ?></p>
                    </div>
                    <div class="collection-card-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/kairos')); ?>" class="collection-card">
                    <div class="collection-card-icon icon-kairos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <div class="collection-card-body">
                        <h3 class="collection-card-title"><?php esc_html_e('Documents Kairos', 'amis-sabeel'); ?></h3>
                        <p class="collection-card-description"><?php esc_html_e('Le document Kairos Palestine et les reponses oecumeniques du monde entier.', 'amis-sabeel'); ?></p>
                    </div>
                    <div class="collection-card-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/publications')); ?>" class="collection-card">
                    <div class="collection-card-icon icon-publications">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
                        </svg>
                    </div>
                    <div class="collection-card-body">
                        <h3 class="collection-card-title"><?php esc_html_e('Nos publications', 'amis-sabeel'); ?></h3>
                        <p class="collection-card-description"><?php esc_html_e('Livres traduits, actes de colloques, brochures et etudes produites par notre association.', 'amis-sabeel'); ?></p>
                    </div>
                    <div class="collection-card-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/partenaires')); ?>" class="collection-card">
                    <div class="collection-card-icon icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="collection-card-body">
                        <h3 class="collection-card-title"><?php esc_html_e('Nos partenaires', 'amis-sabeel'); ?></h3>
                        <p class="collection-card-description"><?php esc_html_e('Le reseau d\'organisations et d\'Eglises engagees pour la paix et la justice en Palestine.', 'amis-sabeel'); ?></p>
                    </div>
                    <div class="collection-card-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="section section-primary">
        <div class="container">
            <div class="newsletter-section">
                <h2 class="section-title"><?php esc_html_e('Restez informe de nos publications', 'amis-sabeel'); ?></h2>
                <p class="section-description mb-8"><?php esc_html_e('Recevez automatiquement nos nouveaux articles et la vague de priere hebdomadaire directement dans votre boite mail.', 'amis-sabeel'); ?></p>
                <?php echo do_shortcode('[newsletter_form]'); ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
