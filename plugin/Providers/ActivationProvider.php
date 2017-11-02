<?php defined('ABSPATH') or die;

namespace Plugin\Providers;

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