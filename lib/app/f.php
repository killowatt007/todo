<?php
defined('EXE') or die('Access');

class F
{
	private static $app = null;
  
	public static function getApp()
	{
    if (!self::$app)
    {
      include __DIR__ .'/app.php';
      self::$app = new \app\lib\App();
    }

    return self::$app;
	}

	public static function getPDO()
	{
    include_once __DIR__ .'/pdo.php';
    return new \app\lib\PDO();
	}

  public static function getRegistry($data)
	{
    include_once __DIR__ .'/registry.php';
    return new \app\lib\Registry($data);
	}
}