<?php
/*
Plugin Name: CKEditor for WordPress
Plugin URI: http://wordpress.ckeditor.com/
Description: Replaces the default WordPress editor with <a href="http://ckeditor.com/"> CKEditor</a>
Version: 1.0.1
Author: CKSource, originally created by Dean Lee
Author URI: http://cksource.com/
*/

require_once 'ckeditor_class.php';
add_action('admin_menu', array(&$ckeditor_wordpress, 'add_option_page'));
add_action('admin_head', array(&$ckeditor_wordpress, 'add_admin_head'));
add_action('personal_options_update', array(&$ckeditor_wordpress, 'user_personalopts_update'));

add_action('admin_print_scripts', array(&$ckeditor_wordpress, 'add_post_js'));
add_action('wp_print_scripts', array(&$ckeditor_wordpress, 'add_comment_js'));
add_filter( 'ckeditor_external_plugins', array(&$ckeditor_wordpress, 'ckeditor_wpmore_plugin') );
add_filter( 'ckeditor_buttons', array(&$ckeditor_wordpress, 'ckeditor_wpmore_button') );

/** temporary for vvq **/
add_filter( 'ckeditor_external_plugins', array(&$ckeditor_wordpress, 'ckeditor_externalvvq_plugin') );
add_filter( 'ckeditor_buttons', array(&$ckeditor_wordpress, 'ckeditor_vvqbuttons') );
/** temporary for wppoll **/
add_filter( 'ckeditor_external_plugins', array(&$ckeditor_wordpress, 'wppoll_external') );
add_filter( 'ckeditor_buttons', array(&$ckeditor_wordpress, 'wppoll_buttons') );

/** temporary for ngggallery **/
include_once(dirname(__FILE__) . '/plugins/nggallery/ckeditor.php');

/** temporary for gd-star-rating **/
add_filter( 'ckeditor_external_plugins', array(&$ckeditor_wordpress, 'starrating_external_plugin') );
add_filter( 'ckeditor_buttons', array(&$ckeditor_wordpress, 'starrating_buttons') );

register_activation_hook(basename(dirname(__FILE__)).'/' . basename(__FILE__), array(&$ckeditor_wordpress, 'activate'));
register_deactivation_hook(basename(dirname(__FILE__)).'/' . basename(__FILE__), array(&$ckeditor_wordpress, 'deactivate'));
?>
