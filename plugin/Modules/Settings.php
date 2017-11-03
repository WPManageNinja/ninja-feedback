<?php namespace Plugin\Modules;

use Core\Config\Config;

class Settings
{
	public function registerSettingsMenu() 
	{
		add_submenu_page('edit.php?post_type=feedback', __('Ninja Feedback Settings', 'ninja_feedback'), __('Feedback Settings', 'ninja_feedback'), 'manage_options', 'ninja_feedback_settings', array($this, 'renderSettings'));
	}
	
	public function renderSettings()
	{
		$this->loadAssets();
		echo "<div id='ninja_feedback_app'></div>";
	}
	
	public function loadAssets()
	{
		wp_enqueue_script('ninja_feedback_settings', )
	}
	
}