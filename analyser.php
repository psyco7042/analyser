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


include plugin_dir_path( __FILE__ ) . 'includes/analyser-admin-menu.php';

function analyser_admin_styles(){

}
add_action('admin_enqueue_scripts', 'analyser_admin_styles');