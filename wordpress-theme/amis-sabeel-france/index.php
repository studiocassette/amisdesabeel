<?php
/**
 * The main template file
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <?php if (is_home() && !is_front_page()) : ?>
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            <?php elseif (is_archive()) : ?>
                <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                <?php the_archive_description('<p class="page-description">', '</p>'); ?>
            <?php elseif (is_search()) : ?>
                <h1 class="page-title">
                    <?php printf(esc_html__('Resultats de recherche pour : %s', 'amis-sabeel'), '<span>' . get_search_query() . '</span>'); ?>
                </h1>
            <?php else : ?>
                <h1 class="page-title"><?php esc_html_e('Articles', 'amis-sabeel'); ?></h1>
            <?php endif; ?>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="articles-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
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
