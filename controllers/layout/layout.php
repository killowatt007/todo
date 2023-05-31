<?php
namespace app\controllers;
defined('EXE') or die('Access');

class Layout extends \app\lib\Controller
{
  public function display()
  {
    $view = $this->getView();
    $auth = $this->input->get('auth');

    $view->auth = $auth;
    
    return parent::display();
  }
}