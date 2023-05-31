

<?php if ($this->newtask) {?>
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    Новое задание успешно создано
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php }?>

<div class="row mb-5">
  <div class="col">
    <a href="/edit" class="btn btn-outline-success">Добавить задание</a>
  </div>
  <div class="col">
    <form class="row g-3 d-flex justify-content-end" method="post">
      <div class="col-auto">
        <label for="inputPassword2" class="visually-hidden">Поле</label>
        <select name="order_by" class="form-select" aria-label="Default select example">
          <option value="">- Поле -</option>
          <?php foreach ($this->order_by_options as $opt) {
            $selected = @$this->order['order_by'] == $opt['value'] ? 'selected' : '';
          ?>
            <option <?php echo $selected;?> value="<?php echo $opt['value'];?>"><?php echo $opt['label'];?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-auto">
        <label for="inputPassword2" class="visually-hidden">Порядок</label>
        <select name="order_dir" class="form-select" aria-label="Default select example">
          <option value="">- Порядок -</option>
          <?php foreach ($this->order_dir_options as $opt) {
            $selected = @$this->order['order_dir'] == $opt['value'] ? 'selected' : '';
          ?>
            <option <?php echo $selected;?> value="<?php echo $opt['value'];?>"><?php echo $opt['label'];?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary mb-3">Сортировать</button>
      </div>
    </form>
  </div>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php foreach ($this->tasks as $row) {?>
  <div class="col">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="">
            <h5 class="card-title"><?php echo $row['name'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['email'];?></h6>
          </div>
          <small class="text-muted">
            <?php echo $row['status'];?><br>
            <?php echo $row['admin_edit_text'];?>
          </small>
        </div>
        <p class="card-text"><?php echo $row['text'];?></p>
        <?php if ($this->isAuth) {?>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="/edit?id=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-secondary">Редактировать</a>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
  <?php }?>
</div>

<nav class="mt-5">
  <ul class="pagination">
    <?php for ($i=0; $i<$this->pagination['pages']; $i++) {
      $number = $i+1;
      $active = $this->pagination['active'] == $number ? true : false;
    ?>
      <li class="page-item <?php echo $active ? 'disabled' : '';?>">
        <a class="page-link text-dark <?php echo $active ? 'fw-bold' : '';?>" href="/?page=<?php echo $number;?>"><?php echo $number;?></a>
      </li>
    <?php }?>
  </ul>
</nav>