<?php

namespace Core\Config;

class ConfigInstance
{
	protected $config = [];

	protected $defaultConfig = [
		'baseUrl' => null,
		'basePath' => null,
		'baseFile' => null,
        'providers' => [
            'admin' => [],
            'public' => [],
            'common' => [],
        ]
    ];

	public function __construct($baseFile)
	{
		$basePath = dirname($baseFile);

		if (file_exists($configFilePath = $basePath.'/config.php')) {
			$this->config = require($configFilePath);
		}

		$this->config = array_merge(
			$this->defaultConfig,
			$this->config, [
				'baseFile' => $baseFile,
				'basePath' => $basePath,
				'baseUrl' => plugin_dir_url($baseFile)
			]
		);
	}

	public function set($key, $value)
	{
		$this->config[$key] = $value;
		return $this;
	}

	public function get($key = null, $default = null)
	{
		if (!$key) {
			return $this->config;
		} else {
			return isset($this->config[$key]) ? $this->config[$key] : $default;
		}
	}
}