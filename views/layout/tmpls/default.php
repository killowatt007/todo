<?php defined('EXE') or die('Access'); ?>

<!doctype html>
<html lang="en">
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="icon" type="image/png" href="/pwa/images/icons/icon-128x128.png" /> -->
		<meta charset="utf-8">
		<title></title>
		<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
		<header>
			<div class="navbar navbar-dark bg-dark shadow-sm">
				<div class="container">
					<a href="/" class="navbar-brand d-flex align-items-center">
						<strong>ToDo</strong>
					</a>
					<div class="col-4 d-flex justify-content-end align-items-center">
						<?php if ($this->auth) {?>
							<a class="btn btn-sm btn-outline-light" href="/auth?action=logout">Выход</a>
						<?php } else {?>
							<a class="btn btn-sm btn-outline-light" href="/auth">Вход</a>
						<?php }?>
					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="album py-5">
				<div class="container">
						<?php echo $this->getChildHtml();?>
				</div>
			</div>
		</main>
		<script src="/assets/jquery.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/js/main.js?<?php echo date('YmdHis')?>"></script>
  </body>
</html>



