<?php 
/*
Plugin Name: Personalized WooCommerce Store
Plugin URI: http://www.najeebmedia.com
Description: Woocommerce extension which allow store admin to add message in almost every area of store like Product, Cart, Checkout, My Account etc. Even some action like redirect login and registrion.
Version: 1.2
Author: Najeeb Ahmad
Author URI: http://www.najeebmedia.com/
Text Domain: nm-woostore
*/


/*
 * Lets start from here
*/

/*
 * loading plugin config file
 */
$_config = dirname(__FILE__).'/config.php';
if( file_exists($_config))
	include_once($_config);
else
	die('Reen, Reen, BUMP! not found '.$_config);


/* ======= the plugin main class =========== */
$_plugin = dirname(__FILE__).'/classes/plugin.class.php';
if( file_exists($_plugin))
	include_once($_plugin);
else
	die('Reen, Reen, BUMP! not found '.$_plugin);

/*
 * [1]
 * TODO: just replace class name with your plugin
 */
$nmwoostore = new NM_PLUGIN_WooStore();


if( is_admin() ){

	$_admin = dirname(__FILE__).'/classes/admin.class.php';
	if( file_exists($_admin))
		include_once($_admin );
	else
		die('file not found! '.$_admin);

	$nmwoostore_admin = new NM_PLUGIN_WooStore_Admin();
}

/*
 * activation/install the plugin data
*/
register_activation_hook( __FILE__, array('NM_PLUGIN_WooStore', 'activate_plugin'));
register_deactivation_hook( __FILE__, array('NM_PLUGIN_WooStore', 'deactivate_plugin'));


