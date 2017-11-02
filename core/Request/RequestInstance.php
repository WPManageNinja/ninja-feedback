<?php defined('ABSPATH') or die;

namespace Core\Request;


class RequestInstance
{
	protected $get = [];
	protected $post = [];
	protected $request = [];
	
	public function __construct($get, $post)
	{
		$this->request = array_merge(
			$this->get = $get,
			$this->post = $post
		);
	}

	public function set($key, $value)
	{
		$this->request[$key] = $value;
		return $this;
	}

	public function get($key = null, $default = null)
	{
		if (!$key) {
			return $this->request;
		} else {
			return isset($this->request[$key]) ? $this->request[$key] : $default;
		}
	}

	public function only($args)
	{
		$values = [];
		$keys = is_array($args) ? $args : func_get_args();
		foreach ($keys as $key) {
			$values[$key] = @$this->request[$key];
		}
		return $values;
	}

	public function except($args)
	{
		$values = [];
		$keys = is_array($args) ? $args : func_get_args();
		foreach ($this->request as $key => $value) {
			if (!in_array($key, $keys)) {
				$values[$key] = $this->request[$key];
			}
		}
		return $values;
	}
}