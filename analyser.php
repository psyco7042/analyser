<?php
/**
 * Plugin Name:       Analyser
 * Plugin URI:        https://github.com/psyco7042/analyser/
 * Description:       Analyse your website's performance
 * Version:           0.1.0
 * Author:            Priyam Sengupta
 * Author URI:        https://github.com/psyco7042
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       analyser
 * Domain Path:       /languages
 */

if(!defined('ABSPATH')) {
    header('location: /');
    exit;
}


function anal_admin_enqueue_styles(){
    $plugin_data = get_plugin_data( __FILE__ );
    wp_enqueue_style('anal-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), $plugin_data['Version'], 'all' );
    wp_enqueue_style('anal-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css', array(), $plugin_data['Version'], 'all' );
    wp_enqueue_style('anal-style', plugins_url('assets/css/analyser-admin.css', __FILE__), array('anal-bootstrap'), $plugin_data['Version'], 'all' );
}

add_action('admin_enqueue_scripts', 'anal_admin_enqueue_styles');

function anal_admin_enqueue_scripts(){
    $plugin_data = get_plugin_data( __FILE__ );
    wp_enqueue_script('anal-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), $plugin_data['Version'], true);
    wp_enqueue_script('anal-script', plugins_url('assets/js/analyser-admin.js', __FILE__), array('jquery'), $plugin_data['Version'], true);
    wp_enqueue_script('anal-chart-script', plugins_url('assets/js/analyser-chart.js', __FILE__), array('jquery'), $plugin_data['Version'], true);
    wp_enqueue_script('anal-chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', array('jquery'), $plugin_data['Version'], true);

}
add_action('admin_enqueue_scripts', 'anal_admin_enqueue_scripts');




include_once plugin_dir_path( __FILE__ ) . 'includes/classes/product-class.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/analyser-admin-menu.php';