<div class="header">

	<div class="logo">

		<div class="logo_text">
			<h1><a href="/"><?php echo $config['first_title'] ?></a></h1>
			<h2><?php echo $config['second_title'] ?></h2>
		</div>

		<div class="search_form">
			<form method="POST" action="#" id="search_form">
				<input type="search" name="search_field" placeholder="Поиск"/>
				<input type="submit" class="search_btn" value="Искать"/>
			</form>
			<?php // Проверка на авторизацию ?>
			<?php if(empty($_SESSION['userData'])){ ?>
				<p><a href="auth.php">Авторизация</a> / <a href="reg.php">Регистрация</a></p>
			<?php }else{ ?>
			<?php // Ryjgrf ds ?>
				<form method="POST" action="config/treatment_forms.php" id="exit_form">
				<p><?= $_SESSION['userData']['userName'];?>
				<input type="submit" class="exit_us" name="exit_us" value="Выход"/></p>
				</form>
			<?php } ?>

		</div>

	</div>

	<div class="menubar">

			<ul class="menu">
				<?php
					foreach( $menu_bar as $h_menu ){
				?>
				<li   class=" <?php if( $dir_name == $h_menu[1]) echo "selected";?> ">
					<a href="<?php echo $h_menu[1] ?>"><?php echo $h_menu[0] ?></a>
				</li>
				<?php } ?>

			</ul>
	</div>
</div>
