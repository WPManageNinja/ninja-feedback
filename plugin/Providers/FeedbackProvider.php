<?php defined('ABSPATH') or die;

namespace Plugin\Providers;

class FeedbackProvider
{
	public function booting($plugin)
	{
		$plugin->addAction('init', 'Plugin\Modules\Feedback@registerPostType');
		$plugin->addAction('init', 'Plugin\Modules\Feedback@registerTaxonomy');
		$plugin->addShortCode('ninja-feedback-list', 'Plugin\Modules\Feedback@handleListShortCode');
		$plugin->addShortCode('ninja-feedback-form', 'Plugin\Modules\Feedback@handleFormShortCode');

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