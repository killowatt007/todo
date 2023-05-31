<?php
namespace app\lib;
defined('EXE') or die('Access');

class Controller
{
  public $name;
  public $view = null;

  protected $app;
  protected $input;

  public $layout = 'layout';

	public function __construct($name)
	{
		$this->name = $name;
    $this->app = \F::getApp();
    $this->input = $this->app->input;
	}

  public function display() 
  {
    $view = $this->getView();
    $html = $view->display();

    return $html;
  }

  public function getView()
  {
    if ($this->view === null)
    {
      $path = ROOT.'/views/'.$this->name.'/'.$this->name.'.php';
  
      if (file_exists($path))
      {
        include_once ROOT.'/lib/app/view.php';
        
        include_once $path;
        $className = '\app\views\\'.ucfirst($this->name);
        $this->view = new $className($this);
      }
    }

    return $this->view;
  }

  public function getModel($name)
  {
    return $this->app->getModel($name);
  }
}