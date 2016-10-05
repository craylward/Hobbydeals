<?php
/*
 * Plugin Name: Storefront - Lines and Circles
 * Plugin URI: http://wpdevelopment.me
 * Description: Adds awesome lines and circles animation on the front page of your website!
 * Version: 1.0.0
 * Author: Shramee Srivastav
 * Author URI: http://wpdevelopment.me/shramee
 * Text Domain: storefront-lines-and-circles
 * Domain Path: /languages/
  * @author Shramee Srivastav <shramee.srivastav@gmail.com>
------------------------------------------------------------------------
 * Copyright 2016  Shramee Srivastav

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/** Including abstract class */
require_once( 'includes/class-abstract.php' );

/** Including variables and function */
require_once( 'includes/vars-n-funcs.php' );

/** Including customizer class */
require_once( 'includes/class-customizer-fields.php' );

/** Including public class */
require_once( 'includes/class-public.php' );

/** Including admin class */
require_once( 'includes/class-admin.php' );

/**
 * Returns the main instance of Storefront_Lines_And_Circles to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Storefront_Lines_And_Circles
 */
function Storefront_Lines_And_Circles() {
	return Storefront_Lines_And_Circles::instance();
} // End Storefront_Lines_And_Circles()

Storefront_Lines_And_Circles();

/**
 * Main Storefront_Lines_And_Circles Class
 *
 * @class Storefront_Lines_And_Circles
 * @version	1.0.0
 * @since 1.0.0
 * @package	Storefront_Lines_And_Circles
 * @author Shramee Srivastav <shramee.srivastav@gmail.com>
 */
final class Storefront_Lines_And_Circles {
	/**
	 * Storefront_Lines_And_Circles The single instance of Storefront_Lines_And_Circles.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $version;

	/**
	 * The admin object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $admin;

	/**
	 * The public object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $public;

	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct() {
		$this->token 			= 'storefront-lines-and-circles';
		$this->plugin_url 		= plugin_dir_url( __FILE__ );
		$this->plugin_path 		= plugin_dir_path( __FILE__ );
		$this->version 			= '1.0.0';

		register_activation_hook( __FILE__, array( $this, 'install' ) );

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		add_action( 'init', array( $this, 'setup' ) );

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_links' ) );
	}

	/**
	 * Setup all the things.
	 * Only executes if Storefront or a child theme using Storefront as a parent is active and the extension specific filter returns true.
	 * Child themes can disable this extension using the storefront_lines_and_circles_enabled filter
	 * @return void
	 */
	public function setup() {
		$theme = wp_get_theme();

		if ( 'Storefront' == $theme->name || 'storefront' == $theme->template && apply_filters( 'storefront_lines_and_circles_supported', true ) ) {

			//Setting admin object
			$this->admin = new Storefront_Lines_And_Circles_Admin( $this->token, $this->plugin_path, $this->plugin_url );

			//Setting public object
			$this->public = new Storefront_Lines_And_Circles_Public( $this->token, $this->plugin_path, $this->plugin_url );

		} else {
			add_action( 'admin_notices', array( $this, 'install_storefront_notice' ) );
		}
	}

	/**
	 * Main Storefront_Lines_And_Circles Instance
	 *
	 * Ensures only one instance of Storefront_Lines_And_Circles is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Storefront_Lines_And_Circles()
	 * @return Main Storefront_Lines_And_Circles instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	} // End instance()

	/**
	 * Load the localisation file.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'storefront-lines-and-circles', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}

	/**
	 * Plugin page links
	 *
	 * @since  1.0.0
	 */
	public function plugin_links( $links ) {
		$plugin_links = array(
			//'<a href="http://support.woothemes.com/">' . __( 'Support', 'storefront-lines-and-circles' ) . '</a>',
			//'<a href="http://docs.woothemes.com/document/storefront-lines-and-circles/">' . __( 'Docs', 'storefront-lines-and-circles' ) . '</a>',
		);

		return array_merge( $plugin_links, $links );
	}

	/**
	 * Installation.
	 * Runs on activation. Logs the version number and assigns a notice message to a WordPress option.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function install() {
		$this->_log_version_number();

		// get theme customizer url
		$url = admin_url() . 'customize.php?';
		$url .= 'url=' . urlencode( site_url() . '?storefront-customizer=true' ) ;
		$url .= '&return=' . urlencode( admin_url() . 'plugins.php' );
		$url .= '&storefront-customizer=true';

		$notices 		= get_option( 'activation_notice', array() );
		$notices[]		= sprintf( __( '%sThanks for installing the Storefront Lines And Circles extension. To get started, visit the %sCustomizer%s.%s %sOpen the Customizer%s', 'storefront-lines-and-circles' ), '<p>', '<a href="' . esc_url( $url ) . '">', '</a>', '</p>', '<p><a href="' . esc_url( $url ) . '" class="button button-primary">', '</a></p>' );

		update_option( 'activation_notice', $notices );
	}

	/**
	 * Log the plugin version number.
	 * @access  private
	 * @since   1.0.0
	 * @return  void
	 */
	private function _log_version_number() {
		// Log the version number.
		update_option( $this->token . '-version', $this->version );
	}

	/**
	 * Storefront install
	 * If the user activates the plugin while having a different parent theme active, prompt them to install Storefront.
	 * @since   1.0.0
	 * @return  void
	 */
	public function install_storefront_notice() {
		echo '<div class="notice is-dismissible updated">
				<p>' . __( 'Storefront Lines And Circles requires that you use Storefront as your parent theme.', 'storefront-lines-and-circles' ) . ' <a href="' . esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=storefront' ), 'install-theme_storefront' ) ) .'">' . __( 'Install Storefront now', 'storefront-lines-and-circles' ) . '</a></p>
			</div>';
	}
} // End Class
