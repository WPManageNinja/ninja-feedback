<?php defined('ABSPATH') or die;

namespace Core\Config;


class Config
{
	protected static $instance = null;

	private function __clone(){}
	private function __wakeup(){}
	protected function __construct(){}

	public static function init($baseFile)
	{
		return static::getInstance($baseFile);
	}

	public static function getInstance($baseFile = null)
	{
		if (is_null(static::$instance)) {
			static::$instance = new ConfigInstance($baseFile);
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