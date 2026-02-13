<?php
/**
 * Theme Customizer
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

function amis_sabeel_customize_register($wp_customize) {
    $wp_customize->add_section('amis_sabeel_hero_section', array(
        'title'    => __('Section Hero', 'amis-sabeel'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('amis_sabeel_hero_title', array(
        'default'           => 'Amis de Sabeel France',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_hero_title', array(
        'label'    => __('Titre principal', 'amis-sabeel'),
        'section'  => 'amis_sabeel_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('amis_sabeel_hero_description', array(
        'default'           => 'Reseau de soutien au Centre oecumenique Sabeel, present a Jerusalem et Nazareth.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_hero_description', array(
        'label'    => __('Description', 'amis-sabeel'),
        'section'  => 'amis_sabeel_hero_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('amis_sabeel_hero_highlight', array(
        'default'           => 'Developper des liens de solidarite avec les Eglises de Palestine-Israel',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_hero_highlight', array(
        'label'    => __('Texte mis en valeur', 'amis-sabeel'),
        'section'  => 'amis_sabeel_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_section('amis_sabeel_footer_section', array(
        'title'    => __('Pied de page', 'amis-sabeel'),
        'priority' => 90,
    ));

    $wp_customize->add_setting('amis_sabeel_footer_about', array(
        'default'           => 'Amis de Sabeel - France (ADSF) est un reseau de soutien au Centre oecumenique Sabeel, present a Jerusalem et Nazareth.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_footer_about', array(
        'label'    => __('Description du footer', 'amis-sabeel'),
        'section'  => 'amis_sabeel_footer_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('amis_sabeel_footer_mission', array(
        'default'           => 'Developper des liens de solidarite avec les Eglises de Palestine-Israel et relayer leur temoignage.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_footer_mission', array(
        'label'    => __('Mission', 'amis-sabeel'),
        'section'  => 'amis_sabeel_footer_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_section('amis_sabeel_contact_section', array(
        'title'    => __('Informations de contact', 'amis-sabeel'),
        'priority' => 100,
    ));

    $wp_customize->add_setting('amis_sabeel_contact_email', array(
        'default'           => 'contact@amisdesabeel.fr',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_contact_email', array(
        'label'    => __('Email de contact', 'amis-sabeel'),
        'section'  => 'amis_sabeel_contact_section',
        'type'     => 'email',
    ));

    $wp_customize->add_setting('amis_sabeel_contact_location', array(
        'default'           => 'France',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('amis_sabeel_contact_location', array(
        'label'    => __('Localisation', 'amis-sabeel'),
        'section'  => 'amis_sabeel_contact_section',
        'type'     => 'text',
    ));

    $wp_customize->add_section('amis_sabeel_social_section', array(
        'title'    => __('Reseaux sociaux', 'amis-sabeel'),
        'priority' => 110,
    ));

    $social_networks = array(
        'facebook'  => __('Facebook', 'amis-sabeel'),
        'twitter'   => __('Twitter', 'amis-sabeel'),
        'youtube'   => __('YouTube', 'amis-sabeel'),
        'instagram' => __('Instagram', 'amis-sabeel'),
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('amis_sabeel_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control('amis_sabeel_social_' . $network, array(
            'label'    => $label,
            'section'  => 'amis_sabeel_social_section',
            'type'     => 'url',
        ));
    }
}
add_action('customize_register', 'amis_sabeel_customize_register');

function amis_sabeel_customize_preview_js() {
    wp_enqueue_script(
        'amis-sabeel-customizer',
        AMIS_SABEEL_URI . '/assets/js/customizer.js',
        array('customize-preview'),
        AMIS_SABEEL_VERSION,
        true
    );
}
add_action('customize_preview_init', 'amis_sabeel_customize_preview_js');
