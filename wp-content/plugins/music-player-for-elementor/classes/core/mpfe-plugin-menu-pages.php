<?php
final class MPFE_Plugin_Menu_Pages {

	public function __construct() {
		add_action('admin_menu', array($this, 'add_plugin_pages'));
	}

	public function add_plugin_pages() {
        /*top level menu page*/
        add_menu_page(
            esc_html__("Music Player for Elementor", "music-player-for-elementor"),
            esc_html__("Music Player for Elementor", "music-player-for-elementor"),
            "administrator",
            "mpfe-dashboard",
            null,
            'dashicons-format-audio',
            2
        );

        /*sub-menu page*/
        add_submenu_page(
            "mpfe-dashboard",
            esc_html__("Dashboard", "music-player-for-elementor"),
            esc_html__("Dashboard", "music-player-for-elementor"),
            "administrator",
            "mpfe-dashboard",
            array($this, 'mpfe_dashboard_page'),
            1
        );

        /*sub-menu page*/
        add_submenu_page(
            "mpfe-dashboard",
            esc_html__("Pro Musician Tools", "music-player-for-elementor"),
            esc_html__("Pro Musician Tools", "music-player-for-elementor"),
            "administrator",
            "mpfe-musician-tools",
            array($this, 'mpfe_musician_tools_page'),
            1
        );
	}

	public function mpfe_dashboard_page() {
		?>
		<div class="mpfe_wrap">
			<div class="mpfe_wrap_head">
				<h1>Welcome to Music Player for Elementor</h1>
			</div>
			<div class="mpfe_welcome wpfe_wrap_block">
				<h4>Congratulations for using a premium designed music player addon!</h4>
				We want to make sure that everything is nice and clear for you. Please review the short FAQ below, we promise that it will not take more than one minute.
			</div>

			<div class="wpfe_wrap_block">
				<h4>What is it?</h4>
				<div class="mpfe_wrap_desc">
					Music Player for Elementor is a professionally designed and flexible audio player addon for Elementor, perfect for musicians, artists, record labels, recording studios, DJs, podcasters, digital product stores and anyone working in the music industry.
				</div>
			</div>

			<div class="wpfe_wrap_block">
				<h4>Do I need a special configuration?</h4>
				<div class="mpfe_wrap_desc">
					No initial configuration is needed to use the audio player. Just make sure you have the free version of <strong>Elementor plugin installed and active</strong>. 
				</div>
			</div>

			<div class="wpfe_wrap_block">
				<h4>How to use it?</h4>
				<div class="mpfe_wrap_desc">
					Install the plugin, edit any page in Elementor, search for "Music Player" in the widgets list and drag the music player widget anywhere on your page. You can add or remove songs to your playlist, customize the audio player images, add purchase links for your album, change the player layout or add individual promo links for each song. Please check the below video for more details about the customization options that this plugin offers.

					<div class="mpfe_img_yt">
						<a href="https://youtu.be/6CagCkhVauI" target="_blank">
							<img src="<?php echo esc_attr(esc_url(MPFE_DIR_URL . '/img/YouTubeImgCover.jpg')); ?>" class="img_yt">
						</a>
					</div>
				</div>
			</div>

			<div class="mpfe-header-quick-links">
				<a href="https://wordpress.org/support/plugin/music-player-for-elementor/" class="button helper-quick-link  button-primary" target="_blank">
					Report a problem			</a>
				<a href="https://wordpress.org/support/plugin/music-player-for-elementor/" class="button helper-quick-link  button-primary" target="_blank">
					Suggest a feature			</a>
			</div>

			<div class="wpfe_wrap_block wpfe_promo">
				<div class="mpfe_icon_pro text_center">
					<img src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/icon-256x256.png"); ?>">
				</div>
				<div class="mpfe_wrap_desc text_center">
					<span class="vibrant_color">Go pro</span> and build a spectacular website using our complete set of tools dedicated to musicians.
				</div>
				<div class="mpfe_wrap_desc pro_features">
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						<strong>Music Player for Elementor (Pro)</strong>
					</div>
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						20+ additional, professionally designed, music oriented Elementor widgets
					</div>
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						Elementor templates
					</div>
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						Premium music WordPress theme
					</div>
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						Complete demo websites
					</div>
					<div class="single_feat">
						<span><img class="checked" src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/checked.png"); ?>"></span>
						Slider Revolution plugin (included for free)
					</div>
				</div>
				<div class="text_center">
					<a href="<?php echo esc_url(admin_url('admin.php?page=mpfe-musician-tools')); ?>" class="mpfe_adm_btn">More Details
				</a>
				</div>
			</div>
		</div>
		<?php
	}

	public function mpfe_musician_tools_page() {
		$promo_url = "https://smartwpress.com/project/slide-modern-music-wordpress-theme/?ref=mpfe";
		$more_widgets = array(
			array(
				'title'	=> 'Discography Vinyl Style',
				'img'	=> 'discography-vinyl-style.jpg'
			),
			array(
				'title'	=> 'Discography Creative',
				'img'	=> 'discography-creative.jpg'
			),
			array(
				'title'	=> 'Discography Grid',
				'img'	=> 'discography-grid.jpg'
			),
			array(
				'title'	=> 'Events List (Bright)',
				'img'	=> 'events-list-bright.jpg'
			),
			array(
				'title'	=> 'Events List (Dark)',
				'img'	=> 'events-list-dark.jpg'
			),
			array(
				'title'	=> 'Events Cards',
				'img'	=> 'events-cards.jpg'
			),
			array(
				'title'	=> 'Music Player (Pro Features)',
				'img'	=> 'music-player.jpg'
			),
			array(
				'title'	=> 'Music Player (Dark - Pro Features)',
				'img'	=> 'music-player-dark.jpg'
			),
			array(
				'title'	=> 'About Me',
				'img'	=> 'about-me.jpg'
			),
			array(
				'title'	=> 'Video Section',
				'img'	=> 'about-video-section.jpg'
			),
			array(
				'title'	=> 'Discography Single',
				'img'	=> 'album-single.jpg'
			),
			array(
				'title'	=> 'Upcoming Events Countdown',
				'img'	=> 'upcoming-event-countdown.jpg'
			),
			array(
				'title'	=> 'Upcoming Events Countdown (Light)',
				'img'	=> 'upcoming-event-countdown-style2.jpg'
			),
			array(
				'title'	=> 'Video Section (Creative)',
				'img'	=> 'video-section.jpg'
			),
			array(
				'title'	=> 'Artists',
				'img'	=> 'artists.jpg'
			),
			array(
				'title'	=> 'Blog',
				'img'	=> 'blog.jpg'
			),
			array(
				'title'	=> 'Contact Form',
				'img'	=> 'contact-form.jpg'
			),
			array(
				'title'	=> 'Contact Form Creative',
				'img'	=> 'contact-form-creative.jpg'
			),
			array(
				'title'	=> 'Gallery',
				'img'	=> 'gallery.jpg'
			),
			array(
				'title'	=> 'Gallery Archive',
				'img'	=> 'gallery-archive.jpg'
			),
			array(
				'title'	=> 'Gallery Single',
				'img'	=> 'gallery-single.jpg'
			),
			array(
				'title'	=> 'Newsletter MailChimp Form',
				'img'	=> 'newsletter-mailchimp-form.jpg'
			),
			array(
				'title'	=> 'Quote',
				'img'	=> 'quote.jpg'
			),
			array(
				'title'	=> 'Testimonial',
				'img'	=> 'testimonial.jpg'
			)
		);

		?>
		<div class="mpfe_wrap">
			<div class="mpfe_wrap_head_tc">
				<div class="mpfe_left">
					<h1>The complete pack for musicians</h1>
					<div>
					<p class="mpfe_admin_content">Build a spectacular musician website using our most powerful music wordpress theme. </p>
					<p class="mpfe_admin_content">With 20+ additional custom designed <strong>Elementor widgets</strong>, ready to use <strong>Elementor templates</strong>, full demo websites, custom posts for your discography, events, gallery, artist and videos, a professional support system and bundled premium plugins, Slide is the perfect WordPress solution for everyone working in the music industry.</p>
					<p class="btn_cont">
						<a href="<?php echo esc_url($promo_url); ?>" target="_blank" class="mpfe_adm_btn">GET PRO NOW</a>
					</p>
					<div class="star_rating">
						<img src="<?php echo  esc_attr(MPFE_DIR_URL . "/img/slide-star-rating.png"); ?>"><span class="star_rating_msg">4.88 / 5 rating after 1000+ customers</span>
					</div>
					</div>
					</div>
					<div class="mpfe_right">
				</div>
			</div>

			<div class="mpfe_more_widgets">
				<?php foreach ($more_widgets as $pro_widget) { ?>
					<div class="mpfe_widget_container">
						<a class="mpfe_widget_lnk" href="<?php echo esc_attr(esc_url($promo_url)); ?>" target="_blank">
							<img class="pro_widget_img" src="<?php echo esc_attr(esc_url(MPFE_DIR_URL . "/img/pro/" .$pro_widget['img'])); ?>">
							<div class="pro_widget_name"><?php echo esc_html($pro_widget['title']); ?> </div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php
	}


}

if (is_admin()) {
    $mpfe_menu_pages = new MPFE_Plugin_Menu_Pages();
}