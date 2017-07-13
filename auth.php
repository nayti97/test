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

		<?php require('includes/header.php') ?>

		<div class="reg_form">

			<div class="reg_auth">
				<h1><center>Авторизация</center></h1>

					<form method="POST" action="config/treatment_forms.php" id="auth_form">
						<div class="form_block">
							<span>Введите логин:</span> <input type="text" name="login" id="login" value="<?= $_SESSION['login_auth']; ?>" placeholder="Ваш логин"/>
							<br>
							<span>Введите пароль:</span> <input type="password" id="email" name="password" placeholder="Ваш пароль"/>
							<br>
							<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
							<span class="error"><?= $_SESSION['error']; ?></span>
							<span class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
						</div>
						<center><input type="submit" name="auth_us" class="but_reg" value="Авторизоваться" /></center>
					</form>

			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>