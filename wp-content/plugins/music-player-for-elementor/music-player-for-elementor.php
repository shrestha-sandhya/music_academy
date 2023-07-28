<?php

/**
 * Plugin Name: Music Player for Elementor
 * Plugin URI: http://www.smartwpress.com/
 * Description: Music Player For Elementor is a stylish audio player addon for Elementor. Promote your music with an easy to use and highly customizable mp3 player and audio player.
 * Version: 1.4
 * Tested up to: 5.7
 * Author: SmartWPress
 * Author URI: https://www.smartwpress.com
 * Text Domain: music-player-for-elementor
 * Domain Path: /languages
 * License: GNU General Public License version 2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!defined('MPFE_VERSION')) {
	define('MPFE_VERSION', '1.3.1');
}
if (!defined('MPFE_DIR_PATH')) {
	define('MPFE_DIR_PATH', plugin_dir_path(__FILE__ ) );
}
if (!defined('MPFE_DIR_URL')) {
	define('MPFE_DIR_URL', plugin_dir_url(__FILE__ ) );
}
if (!defined('MPFE_BASE')) {
	define('MPFE_BASE', plugin_basename(__FILE__) );
}

require_once(MPFE_DIR_PATH . 'classes/core/load-music-player-for-elementor.php');