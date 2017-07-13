<?php 
	require('config/config.php'); 
	require('config/token.php');
	$dir_name = basename(__FILE__);
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Mysite</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>

<body>

	<div class="main">

		<?php require('includes/header.php'); ?>

		<div class="reg_form">

			<div class="reg_auth">
				<h1><center>Регистрация</center></h1>

					<form method="POST" action="config/treatment_forms.php" id="reg_form">
						<div class="form_block">
							<span>Введите логин:</span> <input type="text" name="login" value="<?= $_POST['login']; ?>" minlength="4" maxlength="12" pattern="^[a-zA-Z0-9_]+$" placeholder="Логин"/>
							<br>
							<span>Введите почту:</span>  <input type="email" name="email" value="<?= $_POST['email']; ?>" maxlength="32" placeholder="Email"/>
							<br>
							<span>Введите ваше имя:</span> <input type="text" name="name" value="<?= $_POST['name']; ?>" pattern="^[a-zA-Z0-9А-Яа-яЁё ]+$" minlength="4" maxlength="32" placeholder="Имя"/>
							<br>
							<span>Введите пароль:</span> <input type="password" name="password_1" placeholder="Пароль"/>
							<br>
							<span>Повтор пароля:</span> <input type="password" name="password_2" placeholder="Повтор пароля"/>
							<br>
							<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
							<span class="error"><?= $_SESSION['error']; ?></span>
							<span class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
						</div>
						<center><input type="submit" name="reg_us" class="but_reg" value="Зарегистрироваться" /></center>

					</form>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>