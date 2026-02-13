<?php
/**
 * The header for our theme
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link sr-only" href="#primary"><?php esc_html_e('Aller au contenu', 'amis-sabeel'); ?></a>

    <header id="masthead" class="site-header">
        <nav class="container">
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php echo esc_url(AMIS_SABEEL_URI . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                <?php endif; ?>
            </div>

            <div class="main-navigation" id="site-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'amis_sabeel_default_menu',
                    'link_before'    => '',
                    'link_after'     => '',
                ));
                ?>
            </div>

            <div class="header-actions">
                <a href="<?php echo esc_url(home_url('/recherche')); ?>" class="btn btn-ghost btn-icon" aria-label="<?php esc_attr_e('Rechercher', 'amis-sabeel'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </a>

                <button class="btn btn-ghost btn-icon mobile-menu-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Menu', 'amis-sabeel'); ?>">
                    <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                    <svg class="close-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <div id="mobile-menu" class="mobile-navigation">
            <div class="container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'mobile-menu-list',
                    'container'      => false,
                    'fallback_cb'    => 'amis_sabeel_default_menu',
                ));
                ?>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
