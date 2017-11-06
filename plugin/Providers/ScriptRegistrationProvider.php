<?php

namespace Plugin\Providers;

use Core\Config\Config;
use Core\Resource\Resource;

class ScriptRegistrationProvider
{
	public function booting($plugin)
	{
		$plugin->addAction('wp_enqueue_scripts', function() {
			wp_register_script(
				Config::get('name'),
				Resource::url('js/feedback_public.js'),
				array('jquery'), 
				Config::get('version'),
				true
			);
		});

		$plugin->addAction('wp_enqueue_scripts', function() {
			wp_register_script(
				Config::get('name').'_admin_settings',
				Resource::url('js/feedback_settings_admin.js'),
				array('jquery'),
				Config::get('version'),
				true
			);
		});
	}
}