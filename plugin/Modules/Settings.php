<?php namespace Plugin\Modules;

use Core\Config\Config;
use Core\Resource\Resource;

class Settings
{
	public function registerSettingsMenu() 
	{
		add_submenu_page('edit.php?post_type=feedback', __('Ninja Feedback Settings', 'ninja_feedback'), __('Feedback Settings', 'ninja_feedback'), 'manage_options', 'ninja_feedback_settings', array($this, 'renderSettings'));
	}
	
	public function renderSettings()
	{
		if(WP_DEBUG) {
			$url = 'http://localhost:8080/assets/js/feedback_settings_admin.js';
		} else {
			$url = Resource::url('js/feedback_settings_admin.js');
		}
		
		wp_enqueue_script(
			Config::get('name').'_admin_settings',
			$url,
			array('jquery'),
			Config::get('version'),
			true
		);
		echo "<div id='ninja_feedback_app'></div>";
	}
	
	
}