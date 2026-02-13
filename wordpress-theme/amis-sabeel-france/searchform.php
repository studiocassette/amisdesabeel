<?php
/**
 * Template for displaying search forms
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="sr-only"><?php echo esc_html_x('Rechercher :', 'label', 'amis-sabeel'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Rechercher...', 'placeholder', 'amis-sabeel'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </svg>
        <span class="sr-only"><?php echo esc_html_x('Rechercher', 'submit button', 'amis-sabeel'); ?></span>
    </button>
</form>
