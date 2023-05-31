<?php
namespace app\views;
defined('EXE') or die('Access');

class Index extends \app\lib\View
{
  public $newtask;
  public $order = [];
  public $page = 1;

  public function display()
  {
    $tasksModel = $this->getModel('tasks');

    $this->tasks = $tasksModel->getTaskList($this->order, $this->page);
    $this->order_by_options = [
      ['value'=>'name', 'label'=>'Имя пользователя'],
      ['value'=>'email', 'label'=>'Email'],
      ['value'=>'status_id', 'label'=>'Статус']
    ];
    $this->order_dir_options = [
      ['value'=>'asc', 'label'=>'Возростание'],
      ['value'=>'desc', 'label'=>'Убывание']
    ];

    $this->pagination = [
      'pages' => ceil($tasksModel->getTaskCount() / 3),
      'active' => $this->page
    ];

    $this->isAuth = $this->getModel('user')->isAuth();

    return parent::display();
  }
}