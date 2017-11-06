<?php defined('ABSPATH') or die;

return [
    
    'name' => 'ninja-feedback',
	
    'title' => 'Ninja Feedback',

    'version' => '1.0.0',

    'providers' => [

        'admin' => [
            Plugin\Providers\ActivationProvider::class,
        ],

        'public' => [
            Plugin\Providers\ScriptRegistrationProvider::class,
        ],

        'common' => [
            Plugin\Providers\CommonProvider::class,
            Plugin\Providers\FeedbackProvider::class,
        ],
    ],
];
