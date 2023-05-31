<?php
namespace app\models;
defined('EXE') or die('Access');

class Tasks extends \app\lib\Model
{
  public function getTaskText($id)
  {
    $task = $this->pdo
      ->setQuery('SELECT text FROM Tasks WHERE id='.$id)
      ->loadAssoc();

    return $task['text'];
  }

  public function getTaskCount($order = null)
  {
    $data = $this->pdo
      ->setQuery('SELECT COUNT(id) FROM Tasks')
      ->loadAssoc();

    return $data['COUNT(id)'];
  }

  public function getTaskList($order, $page = 1)
  {
    if (!empty($order)) {
      $order = 'ORDER BY t0.'.$order['order_by'].' '.$order['order_dir'];
    }
    else {
      $order = 'ORDER BY t0.id DESC';
    }

    $start = $page * 3 - 3;

    $tasks = $this->pdo
      ->setQuery('
        SELECT 
          t0.id,
          t0.name,
          t0.email,
          t0.text,
          t0.admin_edit,
          t1.label AS status
        FROM Tasks t0
          LEFT JOIN Status t1 ON (t1.id=t0.status_id)
        '.$order.'
        LIMIT '.$start .', 3
      ')
      ->loadAssocList();

    foreach ($tasks as &$row) {
      $row['admin_edit_text'] = $row['admin_edit'] ? 'адм. ред.' : '';
    }

    return $tasks;
  }

  public function getTaskForForm($id)
  {
    $task = $this->pdo
      ->setQuery('SELECT name, email, text, status_id FROM Tasks WHERE id='.$id)
      ->loadAssoc();

    return $task;
  }

  public function store($taskid, $iscompleted, $data)
  {
    $userModel = $this->getModel('user');

    $dataQ = [];
    $data['status_id'] = $iscompleted ? 2 : 1;
    
    if ($taskid) {
      $data['date_update'] = date('Y-m-d H:i:s');
    }
    else {
      $data['date_create'] = date('Y-m-d H:i:s');
    }

    foreach ($data as $key => $val)
    {
      $val = htmlspecialchars($val);
      $dataQ[$key] = $this->pdo->q($val);
    }

    if ($taskid) 
    {
      $set = '';
      $oldTaskText = $this->getTaskText($taskid);

      if ($userModel->isAuth() and $oldTaskText != $data['text'])
        $dataQ['admin_edit'] = 1;

      foreach ($dataQ as $key => $val) {
        $set .= $set ? ',' : '';
        $set .= $key.'='.$val;
      }

      $this->pdo
        ->setQuery('UPDATE Tasks SET '.$set.' WHERE id='.$taskid)
        ->execute();
    }
    else
    {
      $this->pdo
        ->setQuery('
          INSERT INTO 
            Tasks
            ('.implode(',', array_keys($dataQ)).') 
          VALUES 
            ('.implode(',', array_values($dataQ)).') 
        ')
        ->execute();
    }
  }
}