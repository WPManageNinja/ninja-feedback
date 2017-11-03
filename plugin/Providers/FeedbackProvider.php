<?php namespace Plugin\Providers;

defined('ABSPATH') or die;

class FeedbackProvider
{
	public function booting($plugin)
	{
		$plugin->addAction('init', 'Plugin\Modules\Feedback@registerPostType');
		$plugin->addAction('init', 'Plugin\Modules\Feedback@registerTaxonomy');
		$plugin->addShortCode('ninja-feedback-list', 'Plugin\Modules\Feedback@handleListShortCode');
		$plugin->addShortCode('ninja-feedback-form', 'Plugin\Modules\Feedback@handleFormShortCode');
		$plugin->addAction('init', 'Plugin\Modules\Settings@registerSettingsMenu');

		$this->registerAjaxHandlers($plugin);
	}

	public function booted($plugin)
    {
    	// ...
    }

    private function registerAjaxHandlers($plugin)
    {
    	$plugin->addAjaxAction('get.feedback.by.category', 'Plugin\Modules\Feedback@getFeedbackByCategory');
        $plugin->addAjaxAction('get.feedback.by.category', 'Plugin\Modules\Feedback@getFeedbackByCategory', true);
    }
}