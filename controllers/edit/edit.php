<?php
namespace app\controllers;
defined('EXE') or die('Access');

class Edit extends \app\lib\Controller
{
  public function display()
  {
    $taskid = $this->input->get('id');

    if (!$this->getModel('user')->isAuth() and $taskid)
      header('Location: /');
    
    return parent::display();
  }



  

  public function store()
  {
    $tasksModel = $this->getModel('tasks');

    $iscompleted = $this->input->get('iscompleted') ? 1 : 0;
    $taskid = $this->input->get('taskid');

    $tasksModel->store($taskid, $iscompleted, [
      'name' => $this->input->get('name'),
      'email' => $this->input->get('email'),
      'text' => $this->input->get('text')
    ]);

    if (!$taskid)
      header('Location: /?newtask=1');
    else
      header('Location: /');
  }
}