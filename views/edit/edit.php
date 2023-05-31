<?php
namespace app\views;
defined('EXE') or die('Access');

class Edit extends \app\lib\View
{
  public function display()
  {
    $tasksModel = $this->getModel('tasks');

    $this->taskid = $this->app->input->get('id');
    $this->task = $this->taskid
      ? $tasksModel->getTaskForForm($this->taskid)
      : []
    ;
    
    $this->status_checked = @$this->task['status_id'] == 2 ? 'checked' : '';
    $this->isAuth = $this->getModel('user')->isAuth();

    return parent::display();
  }
}