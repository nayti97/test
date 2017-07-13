<?php 
	require('config/config.php'); 
	$dir_name = basename(__FILE__);
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Mysite</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="main">

		<?php require('includes/header.php') ?>

		<div class="site_content">

			<?php require("includes/sidebar.php") ?>

			<div class="content">
				<h2>Контакты</h2>

				<div class="send">
					<form method="POST" action="#" id="review">
						<input type="text" name="cont_name" placeholder="Ваше имя"/>
						<input type="text" name="cont_email" placeholder="Ваш email"/>
						<textarea name="cont_text"/></textarea>
						<input type="submit" value="Отправить"/>	
					</form>
					
				</div>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>
