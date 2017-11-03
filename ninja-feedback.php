<?php defined('ABSPATH') or die;

/**
 * @package Ninja Feedback
 */

/*
Plugin Name: Ninja Feedback
Description: A feedback plugin by WP Manage Ninja.
Version: 1.0.0
Author: WP Manage Ninja
Author URI: https://wpmanageninja.com
License: GPLv2 or later
Text Domain: ninja-feedback
*/

require_once 'vendor/autoload.php';

Core\App\App::run(__FILE__);
