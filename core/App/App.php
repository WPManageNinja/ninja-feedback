<?php defined('ABSPATH') or die;

namespace Core\App;

class App
{
	protected static $instance = null;

	private function __clone(){}
	private function __wakeup(){}
	protected function __construct(){}

	public static function run($baseFile, $config)
    {
        return static::getInstance($baseFile, $config);
    }

	public static function getInstance($baseFile = null, $config = null)
	{
		if (is_null(static::$instance)) {
			static::$instance = new AppInstance($baseFile, $config);
		}
		return static::$instance;
	}

	public static function __callStatic($method, $args)
	{
		return call_user_func_array(array(
			static::getInstance(), $method
		), $args);
	}
}