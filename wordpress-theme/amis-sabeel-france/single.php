<?php
/**
 * The template for displaying all single posts
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();

        $post_type = get_post_type();
        $category = '';
        $category_label = '';

        if ($post_type === 'document') {
            $terms = get_the_terms(get_the_ID(), 'document_category');
            if ($terms && !is_wp_error($terms)) {
                $category = $terms[0]->slug;
                $category_label = $terms[0]->name;
            }
        } elseif ($post_type === 'prayer') {
            $category = 'prieres';
            $category_label = __('Vagues de prieres', 'amis-sabeel');
        }
        ?>

        <div class="page-header">
            <div class="container">
                <nav class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'amis-sabeel'); ?></a>
                    <span class="breadcrumb-separator">/</span>
                    <?php if ($post_type === 'document') : ?>
                        <a href="<?php echo esc_url(home_url('/documents')); ?>"><?php esc_html_e('Documents', 'amis-sabeel'); ?></a>
                    <?php elseif ($post_type === 'prayer') : ?>
                        <a href="<?php echo esc_url(home_url('/vagues-de-prieres')); ?>"><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></a>
                    <?php elseif ($post_type === 'partner') : ?>
                        <a href="<?php echo esc_url(home_url('/partenaires')); ?>"><?php esc_html_e('Partenaires', 'amis-sabeel'); ?></a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'amis-sabeel'); ?></a>
                    <?php endif; ?>
                    <span class="breadcrumb-separator">/</span>
                    <span><?php the_title(); ?></span>
                </nav>

                <?php if ($category) : ?>
                    <span class="category-badge <?php echo esc_attr(amis_sabeel_get_category_badge_class($category)); ?> mb-4">
                        <?php echo esc_html($category_label); ?>
                    </span>
                <?php endif; ?>

                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="content-area">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
                    <div class="single-meta">
                        <span class="single-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: middle; margin-right: 0.25rem;">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <?php echo esc_html(get_the_date()); ?>
                        </span>
                        <?php if (get_the_author()) : ?>
                            <span class="single-author">
                                <?php printf(esc_html__('Par %s', 'amis-sabeel'), get_the_author()); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="single-featured-image">
                            <?php the_post_thumbnail('article-large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'amis-sabeel'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php
                    $external_link = get_post_meta(get_the_ID(), 'external_link', true);
                    if ($external_link) :
                        ?>
                        <div class="mt-8">
                            <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                                <?php esc_html_e('Consulter le document original', 'amis-sabeel'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <line x1="10" x2="21" y1="14" y2="3"></line>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </article>

                <?php
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Precedent:', 'amis-sabeel') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Suivant:', 'amis-sabeel') . '</span> <span class="nav-title">%title</span>',
                ));

                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        </div>

    <?php endwhile; ?>
</main>

<?php
get_footer();
