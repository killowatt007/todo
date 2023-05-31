<?php
namespace app\lib;
defined('EXE') or die('Access');

class Input
{
	private $get = null;
	private $post = null;
	private $cookie = null;

	private $data = null;
	
	public function __construct()
	{
    $get = $_GET ?? [];
    $post = $_POST ?? [];
    $cookie = $_COOKIE ?? [];

		$this->get = \F::getRegistry($get);
	 	$this->post = \F::getRegistry($post);
		$this->cookie = \F::getRegistry($cookie);
    
		$this->data = \F::getRegistry(array_merge($get, $post, $cookie));
	}

	public function get($key, $def = null, $var = 'data')
	{
		$val = $this->$var->get($key, $def);

		return $val;
	}

	public function set($key, $val)
	{
		$this->data->set($key, $val);
	}
}

