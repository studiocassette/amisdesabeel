<?php
/**
 * The template for displaying all pages
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
        ?>

        <div class="page-header">
            <div class="container">
                <nav class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'amis-sabeel'); ?></a>
                    <span class="breadcrumb-separator">/</span>
                    <span><?php the_title(); ?></span>
                </nav>
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="content-area">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
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
                </article>

                <?php
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
