<?php

add_action('admin_menu', 'analyser_admin_menu');

function analyser_admin_menu() {
    add_menu_page(
        'Analyser Settings', // Page title
        'Analyser', // Menu title
        'manage_options', // Capability
        'analyser-settings', // Menu slug
        'analyser_settings_page', // Callback function
        'dashicons-chart-area', // Icon URL
        100 // Position
    );
}

add_action( 'admin_menu', 'analyser_admin_menu' );

function analyser_settings_page() {
    ?>
    <div class="wrap">
        <h1>Analyser Settings</h1>
        
    </div>
    <?php
}


