<?php

final class Load_Music_Player_For_Elementor {

	private static $instance = null;

	/**
	 * Plugin Version
	 *
	 * @since 1.2.0
	 * @var string The plugin version.
	 */
	const PLUGIN_DOMAIN = 'music-player-for-elementor';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action('init', array($this, 'init'));
		add_action('admin_enqueue_scripts', array($this, 'load_admin_scripts_and_styles'));
		add_action('wp_enqueue_scripts', array($this, 'load_front_scripts_and_styles'));
		add_action('activated_plugin', array($this, 'mpfe_redirect_to_dash'));
		add_filter('plugin_action_links_' . MPFE_BASE, array($this, 'add_action_links'));

		$this->include_files();
		
	}

	public function init() {
		$locale = apply_filters('plugin_locale', get_locale(), self::PLUGIN_DOMAIN);
		$trans_location = trailingslashit(WP_LANG_DIR) . "plugins/" . self::PLUGIN_DOMAIN . '-' . $locale . '.mo';
		
		/*wp-content/languages/plugins/music-player-for-elementor-es_ES.mo*/
		if ($loaded = load_plugin_textdomain(self::PLUGIN_DOMAIN, FALSE, $trans_location)) {
			return $loaded;
		}

		/*music-player-for-elementor/languages/es_ES.mo*/
		load_plugin_textdomain(self::PLUGIN_DOMAIN, FALSE, MPFE_DIR_PATH . '/languages/');
	}

	public function load_admin_scripts_and_styles() {
		wp_enqueue_style('mpfe_admin_style',  MPFE_DIR_URL . '/css/mpfe-admin-style.css');
	}

	public function load_front_scripts_and_styles() {
		wp_enqueue_style('mpfe_front_style',  MPFE_DIR_URL . '/css/mpfe-front-style.css', array(), MPFE_VERSION);
		wp_enqueue_style('font-awesome', MPFE_DIR_URL . '/assets/fontawesome-free-5.15.1/css/all.min.css', array(), '5.15.1', 'all');
	}

	private function include_files() {
		require_once(MPFE_DIR_PATH."/classes/core/mpfe-check-elementor.php");
		require_once(MPFE_DIR_PATH."/classes/core/mpfe-plugin-menu-pages.php");
	}

	public function mpfe_redirect_to_dash($plugin) {
	    if($plugin != 'music-player-for-elementor/music-player-for-elementor.php') {
	    	return;
	    }

        wp_safe_redirect(admin_url('admin.php?page=mpfe-dashboard'));
        exit;
	}

	public function add_action_links($links) {
		$cust_links = array(
			'<a href="' . admin_url('admin.php?page=mpfe-dashboard') . '">How To</a>',
			'<span><a href="https://smartwpress.com/project/slide-modern-music-wordpress-theme/?ref=mpfe" style="color:#f7366b;font-weight:700;">Go Pro</a></span>'
		);

		return array_merge($links, $cust_links);
	}

    public static function get_instance() {
        if(null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}


if (!function_exists('mpfe_instance')) {
	/**
	 * Returns an instance of the plugin class.
	 */
	function mpfe_instance() {
		return Load_Music_Player_For_Elementor::get_instance();
	}
}

mpfe_instance();