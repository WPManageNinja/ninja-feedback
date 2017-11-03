<?php namespace Plugin\Providers;

defined('ABSPATH') or die;

class ActivationProvider
{
	public function booting($plugin)
    {
    	$plugin->activating('Plugin\Modules\Activator@activate');
    }

	public function booted($plugin)
    {
    	// ...
    }
}