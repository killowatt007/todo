<?php
namespace app\lib;
defined('EXE') or die('Access');

class Model
{
  protected $app;
	protected $pdo;

	public function __construct()
	{
    $this->app = \F::getApp();
		$this->pdo = \F::getPDO();
	}

  public function getModel($name)
  {
    return $this->app->getModel($name);
  }
}