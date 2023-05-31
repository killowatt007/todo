<?php
namespace app\lib;
defined('EXE') or die('Access');

include ROOT .'/lib/app/input.php';

class App
{
  private $cname = null;
  public $input;

  public function exe()
  {
    $this->input = new \app\lib\Input();

    $cname = $this->getControllerName();
    $caction = $this->input->get('action', 'display');

    $controller = $this->getController($cname);
    $html = $controller->$caction();

    echo $html;
  }

  private function getControllerName() 
  {
    if (!$this->cname)
    {
      $routes = include_once ROOT.'/routes.php';

      $uri = $_SERVER['REDIRECT_URL'] ?? '/';
      $uriArr = explode('/', $uri);
      $route = $routes[$uriArr[1]] ?? null;

      if ($route)
      {
        $this->cname = $routes[$uriArr[1]]['controller'];
      }
      else
      {
        $this->error('Route "'.$uriArr[1].'" not found');
      }
    }

    return $this->cname;
  }

  public function getController($name)
  {
    $controller = null;
    $path = ROOT.'/controllers/'.$name.'/'.$name.'.php';

    if (file_exists($path))
    {
      include_once ROOT.'/lib/app/controller.php';

      include_once $path;
      $className = '\app\controllers\\'.ucfirst($name);
      $controller = new $className($name);
    }
    else
    {
      $this->error('Controller "'.$name.'" not found');
    }

    return $controller;
  }

  public function error($msg)
  {
    if (is_array($msg))
    {
      p($msg, false);
    }
    else
    {
      echo $msg;
    }

    exit;
  }

  public function getModel($name)
  {
    $path = ROOT.'/models/'.$name.'.php';

    if (file_exists($path))
    {
      include_once ROOT.'/lib/app/model.php';
      
      include_once $path;
      $className = '\app\models\\'.ucfirst($name);
      $model = new $className();
    }
    else
    {
      $this->error('Model "'.$path.'" not found');
    }

    return $model;
  }
}