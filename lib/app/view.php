<?php
namespace app\lib;
defined('EXE') or die('Access');

class View
{
  public $controller;
  protected $app;

	public function __construct($controller)
	{
		$this->controller = $controller;
    $this->app = \F::getApp();
	}

  public function display() 
  {
    $html = $this->getHtml();

    if ($this->controller->layout and $this->controller->name != $this->controller->layout)
    {
      $cLayout = $this->app->getController($this->controller->layout);
      $vLayout = $cLayout->getView();

      $vLayout->setChildHtml($html);
      $html = $cLayout->display();
    }

    return $html;
  }

  public function getModel($name)
  {
    return $this->app->getModel($name);
  }

  public function getHtml()
  {
    $html = '';
    $path = ROOT.'/views/'.$this->controller->name.'/tmpls/default.php';
  
    if (file_exists($path))
    {
      ob_start();
      include $path;
      $html = ob_get_clean();
    }

    return $html;
  }
}