<?php defined('EXE') or die('Access'); ?>

<?php if ($this->access) {?>
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    Неверный логин или пароль
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php }?>

<div class="form-signin">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal text-center">Авторизация</h1>
    <div class="form-floating">
      <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
    <input type="hidden" name="action" value="login">
  </form>
</div>
