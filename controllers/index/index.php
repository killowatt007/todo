<?php
namespace app\controllers;
defined('EXE') or die('Access');

class Index extends \app\lib\Controller
{
  public function display()
  {
    $view = $this->getView();

    $page = $this->input->get('page', $this->input->get('page'), 'get');
    $order_by = $this->input->get('order_by', $this->input->get('order_by'), 'post');
    $order_dir = $this->input->get('order_dir', $this->input->get('order_dir', 'asc'), 'post');
    $newtask = $this->input->get('newtask');

    $view->newtask = $newtask;

    if ($order_by) {
      $view->order = [
        'order_by' => $order_by,
        'order_dir' => $order_dir
      ];

      setcookie('order_by', $order_by, time()+3600*24, '/', $_SERVER['HTTP_HOST']);
      setcookie('order_dir', $order_dir, time()+3600*24, '/', $_SERVER['HTTP_HOST']);
    }
    else {
      setcookie('order_by', '', time()+3600*24, '/', $_SERVER['HTTP_HOST']);
    }

    if (!$order_dir) {
      setcookie('order_dir', '', time()+3600*24, '/', $_SERVER['HTTP_HOST']);
    }

    if ($page) {
      $view->page = $page;
      setcookie('page', $page, time()+3600*24, '/', $_SERVER['HTTP_HOST']);
    }

    return parent::display();
  }
}