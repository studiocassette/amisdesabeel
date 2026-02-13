<?php
/**
 * The template for displaying partner archive pages
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
                <span><?php esc_html_e('Partenaires', 'amis-sabeel'); ?></span>
            </nav>

            <h1 class="page-title"><?php esc_html_e('Nos partenaires', 'amis-sabeel'); ?></h1>
            <p class="page-description"><?php esc_html_e('Le reseau d\'organisations et d\'Eglises engagees pour la paix et la justice en Palestine.', 'amis-sabeel'); ?></p>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <?php
            $partner_types = get_terms(array(
                'taxonomy'   => 'partner_type',
                'hide_empty' => true,
            ));

            if ($partner_types && !is_wp_error($partner_types)) :
                foreach ($partner_types as $type) :
                    $partners = new WP_Query(array(
                        'post_type'      => 'partner',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'partner_type',
                                'field'    => 'term_id',
                                'terms'    => $type->term_id,
                            ),
                        ),
                    ));

                    if ($partners->have_posts()) :
                        ?>
                        <section class="mb-12">
                            <h2 class="section-title mb-6"><?php echo esc_html($type->name); ?></h2>
                            <div class="partners-grid">
                                <?php
                                while ($partners->have_posts()) :
                                    $partners->the_post();
                                    get_template_part('template-parts/content', 'partner');
                                endwhile;
                                ?>
                            </div>
                        </section>
                        <?php
                        wp_reset_postdata();
                    endif;
                endforeach;
            else :
                if (have_posts()) :
                    ?>
                    <div class="partners-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'partner');
                        endwhile;
                        ?>
                    </div>

                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>',
                        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>',
                    ));
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
