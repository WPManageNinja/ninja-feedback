<?php

namespace Core\Resource;

use Core\Config\Config;

class Resource
{
	public static function view($path, $data = [])
	{
		$ds = DIRECTORY_SEPARATOR;
		$path = str_replace('.', $ds, $path);
		$file = Config::get('basePath').$ds.'resources'.$ds.'views'.$ds.$path.'.php';
		if (file_exists($file)) {
			ob_start();
			extract($data);
			require($file);
			return ob_get_clean();
		}
		die("$file doesn't exists.");
	}

	public static function url($url)
	{
		return Config::get('baseUrl').'resources/assets/'.$url;
	}
}