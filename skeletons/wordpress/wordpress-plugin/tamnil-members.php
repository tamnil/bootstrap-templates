<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              tamnil.com
 * @since             1.0.0
 * @package           Tamnil_Members
 *
 * @wordpress-plugin
 * Plugin Name:       tamnil-members
 * Plugin URI:        tamnil.com/members
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tamnil Saito Jr
 * Author URI:        tamnil.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tamnil-members
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Tamnil_Members{
	
	// Constructor
	function __construct() {
		
		add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
		register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
		
		
		
		if(isset($_GET['download']))
		{
			//$csv = $this->wpa_page_file_download();
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private", false);
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"report.csv\";" );
			header("Content-Transfer-Encoding: binary");
			$this->wpa_page_file_download();
		die();
		//	echo $csv;
		//	exit;
		}
		
	}
	
	/*
	 * Actions perform at loading of admin menu
	 */
	function wpa_add_menu() {
		
		add_menu_page( 'Membros', 'Lista Membros', 'manage_options', 'members-list', array(
				__CLASS__,
				'wpa_page_file_path'
		), plugins_url('images/wp-analytics-logo.png', __FILE__),'2.2.9');
		
		/*
		add_menu_page( 'Membros', 'Lista Membros-download', 'manage_options', 'members-list-download', array(
				__CLASS__,
				'wpa_page_file_download'
		), plugins_url('images/wp-analytics-logo.png', __FILE__),'2.2.9');
		*/
	}
	
	/*
	 * Actions perform on loading of menu pages
	 */
	function wpa_page_file_path() {
		
		$screen = get_current_screen();
// 		if ( strpos( $screen->base, 'analytify-settings' ) !== false ) {
			include( dirname(__FILE__) . '/includes/members-list.php' );
// 		}
// 		else {
// 			include( dirname(__FILE__) . '/includes/analytify-dashboard.php' );
// 		}
		
	}
	
	function wpa_page_file_download() {
		
	//	$screen = get_current_screen();
		// 		if ( strpos( $screen->base, 'analytify-settings' ) !== false ) {
		include( dirname(__FILE__) . '/includes/members-list-download.php' );
		// 		}
		// 		else {
		// 			include( dirname(__FILE__) . '/includes/analytify-dashboard.php' );
		// 		}
			
	}
	
	
	/*
	 * Actions perform on activation of plugin
	 */
	function wpa_install() {
		
		
		
	}
	
	/*
	 * Actions perform on de-activation of plugin
	 */
	function wpa_uninstall() {
		
		
		
	}
	
	
	
}

new Tamnil_Members();