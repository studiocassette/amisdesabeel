<?php
/**
 * The template for displaying prayer archive pages
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
                <span><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></span>
            </nav>

            <span class="category-badge category-badge-prieres mb-4"><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></span>

            <h1 class="page-title"><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></h1>
            <p class="page-description"><?php esc_html_e('Chaque semaine, Sabeel Jerusalem envoie une vague de priere que nous partageons ici en francais.', 'amis-sabeel'); ?></p>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <?php if (have_posts()) : ?>

                <?php
                $first_post = true;
                while (have_posts()) :
                    the_post();

                    if ($first_post) :
                        $first_post = false;
                        ?>
                        <div class="prayer-card mb-8">
                            <div class="prayer-card-content">
                                <div class="prayer-card-header">
                                    <div>
                                        <span class="category-badge category-badge-prieres"><?php esc_html_e('Derniere priere', 'amis-sabeel'); ?></span>
                                        <h2 class="prayer-card-title"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="prayer-card-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                            <line x1="16" x2="16" y1="2" y2="6"></line>
                                            <line x1="8" x2="8" y1="2" y2="6"></line>
                                            <line x1="3" x2="21" y1="10" y2="10"></line>
                                        </svg>
                                        <?php echo esc_html(get_the_date()); ?>
                                    </div>
                                </div>
                                <p class="prayer-card-excerpt"><?php echo esc_html(amis_sabeel_custom_excerpt(get_the_excerpt(), 300)); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                    <?php esc_html_e('Lire la priere complete', 'amis-sabeel'); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <h2 class="section-title mb-6"><?php esc_html_e('Archives des prieres', 'amis-sabeel'); ?></h2>
                        <div class="articles-grid">
                        <?php
                    else :
                        get_template_part('template-parts/content', 'prayer');
                    endif;
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
