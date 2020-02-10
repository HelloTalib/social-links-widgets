<?php
/**
 * Plugin Name: Social links widgets
 * Plugin URI : https://flexthemes.netlify.com
 * Description: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati est commodi inventore. Quod, omnis corrupti.
 * Version: 1.0.0
 * Author: talib
 * Author URI: https://talib.netlify.com
 * License: GPLv2
 * Text Domain: ls-widgets
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) {
    exit;
}

define('PUBLIC_DIR', plugin_dir_url(__FILE__) . '/assets/public');
define('ADMIN_DIR', plugin_dir_url(__FILE__) . '/assets/admin');

require_once plugin_dir_path(__FILE__) . '/includes/sl-widgets-script.php';
require_once plugin_dir_path(__FILE__) . '/includes/sl-widgets-class.php';
