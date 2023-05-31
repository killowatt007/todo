<?php
namespace app\controllers;
defined('EXE') or die('Access');

class Auth extends \app\lib\Controller
{
  public function display()
  {
    $view = $this->getView();
    $access = $this->input->get('access');

    $view->access = $access;
    
    return parent::display();
  }

  public function login()
  {
    $name = $this->input->get('name');
    $password = $this->input->get('password');

    if ($name == 'admin' and $password == '123')
    {
      setcookie('auth', 1, time()+3600*24, '/', $_SERVER['HTTP_HOST']);
      header('Location: /');
    }
    else
    {
      header('Location: /auth?access=1');
    }
  }

  public function logout()
  {
    setcookie('auth', 0, time()+3600*24, '/', $_SERVER['HTTP_HOST']);
    header('Location: /');
  }
}