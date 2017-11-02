<?php defined('ABSPATH') or die;

namespace Core\Request;

class Request
{
	protected static $instance = null;

	private function __clone(){}
	private function __wakeup(){}
	protected function __construct(){}

	public static function getInstance()
	{
		if (is_null(static::$instance)) {
			static::$instance = new RequestInstance($_GET, $_POST);
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