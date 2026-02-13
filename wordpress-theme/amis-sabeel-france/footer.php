<?php
/**
 * The template for displaying the footer
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="footer-logo">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo esc_url(AMIS_SABEEL_URI . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                    <p class="footer-description">
                        <?php echo esc_html(get_theme_mod('amis_sabeel_footer_about', 'Amis de Sabeel - France (ADSF) est un reseau de soutien au Centre oecumenique Sabeel, present a Jerusalem et Nazareth.')); ?>
                    </p>
                    <p class="footer-description">
                        <?php echo esc_html(get_theme_mod('amis_sabeel_footer_mission', 'Developper des liens de solidarite avec les Eglises de Palestine-Israel et relayer leur temoignage.')); ?>
                    </p>
                </div>

                <div class="footer-column">
                    <h3><?php esc_html_e('Navigation', 'amis-sabeel'); ?></h3>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ));
                    } else {
                        ?>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/documents-sabeel')); ?>"><?php esc_html_e('Documents Sabeel', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/kairos')); ?>"><?php esc_html_e('Kairos', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/publications')); ?>"><?php esc_html_e('Publications', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/vagues-de-prieres')); ?>"><?php esc_html_e('Vagues de prieres', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/partenaires')); ?>"><?php esc_html_e('Partenaires', 'amis-sabeel'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>

                <div class="footer-column">
                    <h3><?php esc_html_e('A propos', 'amis-sabeel'); ?></h3>
                    <?php
                    if (has_nav_menu('footer-about')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-about',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ));
                    } else {
                        ?>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/qui-sommes-nous')); ?>"><?php esc_html_e('Qui sommes-nous', 'amis-sabeel'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/qui-sommes-nous#mission')); ?>"><?php esc_html_e('Notre mission', 'amis-sabeel'); ?></a></li>
                            <li><a href="https://sabeel.org" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Sabeel Jerusalem', 'amis-sabeel'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>

                <div class="footer-column footer-contact">
                    <h3><?php esc_html_e('Nous contacter', 'amis-sabeel'); ?></h3>
                    <address>
                        <p><?php echo esc_html(get_theme_mod('amis_sabeel_contact_email', 'contact@amisdesabeel.fr')); ?></p>
                        <p class="mt-2"><?php echo esc_html(get_theme_mod('amis_sabeel_contact_location', 'France')); ?></p>
                    </address>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="footer-copyright">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Tous droits reserves.', 'amis-sabeel'); ?>
                    </p>
                    <div class="footer-legal">
                        <?php
                        if (has_nav_menu('footer-legal')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-legal',
                                'container'      => false,
                                'depth'          => 1,
                                'items_wrap'     => '%3$s',
                            ));
                        } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/mentions-legales')); ?>"><?php esc_html_e('Mentions legales', 'amis-sabeel'); ?></a>
                            <a href="<?php echo esc_url(home_url('/confidentialite')); ?>"><?php esc_html_e('Politique de confidentialite', 'amis-sabeel'); ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
