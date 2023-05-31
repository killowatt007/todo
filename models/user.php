<?php
namespace app\models;
defined('EXE') or die('Access');

class User extends \app\lib\Model
{
  public function isAuth()
  {
    return $this->app->input->get('auth');
  }
}