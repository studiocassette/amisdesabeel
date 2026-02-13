<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="sidebar">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
