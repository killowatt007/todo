<?php defined('EXE') or die('Access'); ?>

<div id="edit">
  <form class="needs-validation" method="post">
    <div class="row g-3">
      <div class="col-12">
        <label for="address" class="form-label">Имя пользователя</label>
        <input value="<?php echo @$this->task['name'];?>" name="name" type="text" class="form-control req" id="address">
      </div>
      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input value="<?php echo @$this->task['email'];?>" name="email" type="text" class="form-control req" id="email">
      </div>
      <div class="col-12">
        <label for="text" class="form-label">Текст задачи</label>
        <textarea name="text" class="form-control req" id="text" rows="3"><?php echo @$this->task['text'];?></textarea>
      </div>
    </div>

    <?php if ($this->isAuth) {?>
      <hr class="my-4">
      <div class="form-check">
        <input <?php echo $this->status_checked;?> name="iscompleted" type="checkbox" class="form-check-input" id="same-address">
        <label class="form-check-label" for="same-address">Выполнено</label>
      </div>
    <?php }?>

    <hr class="my-4">

    <button class="btn btn-outline-primary btn-lg" type="submit">Сохранить</button>

    <input type="hidden" name="action" value="store">
    <input type="hidden" name="taskid" value="<?php echo $this->taskid;?>">
  </form>
</div>