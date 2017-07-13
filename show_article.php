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
</head>

<body>
	<div class="main">

		<?php require('includes/header.php') ?>

		<div class="site_content">

			<?php require("includes/sidebar.php") ?>

			<div class="content">

				<?php // получение данных о выбранной статье и перевод их в массив 
					$result = R::find('articles', "id = ?", array($_GET['id_a']));
					foreach($result as $article){ ?>
						<h1><?php echo "{$article->title}"; ?></h1>
						<div class="description_film">
							<?php echo "{$article->article}"; ?>
						</div>
					<?php } ?>

				<hr>
				<h2>Комментарии</h2>
				<div class="reviews">
					<?php
					$result = R::getAll("SELECT `users`.`name`, `comments`.`title`, `comments`.`text` FROM `users`, `comments` WHERE `users`.`id` = `comments`.`id_user` AND `comments`.`id_parent` = ? AND `comments`.`category` = 0", array($_GET['id_a']));
						foreach($result as $r){			
					?>
								<div class="review_name">
								<?php echo $r['name']; ?>
								</div>
								<div class="review_text">
								<?php echo $r['title']; ?>
								<br>
								<?php echo $r['text']; ?>
								</div>	
						<?php } ?>

				</div>

				<div class="send">
					<form method="POST" action="config/treatment_forms.php" id="review">
						<input type="text" name="title_comment" placeholder="Заголовок"/>
						<textarea name="review_text"/></textarea>
						<input type="hidden" name="parent_id" value="<?php echo $_GET['id_a'] ?>" />
						<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
						<input type="submit" name="new_com_art" value="Отправить"/>	
					</form>
					
				</div>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>