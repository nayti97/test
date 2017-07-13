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

				<?php // получение данных о выбранном фильме и перевод их в массив
					$result = R::find('films_series', "id = ?", array($_GET['id'])); 
					foreach( $result as $fs_data ){
				?>
				<h1><?php echo "{$fs_data->title}"; ?></h1>
				<iframe width="560" height="315" src="<?php echo "{$fs_data->trailer}"; ?>" frameborder="0" allowfullscreen></iframe>
				<div class="info_film_page">
					<span class="lable">Рейтинг:</span> <span class="value"><?php echo "{$fs_data->rating}"; ?>/10</span> 
					<span class="lable">Год:</span> <span class="value"><?php echo "{$fs_data->year}"; ?></span> 
					<span class="lable">Режиссер:</span> <span class="value"><?php echo "{$fs_data->producer}"; ?></span>
				</div>
				<hr>
				<h2>Описание <?php echo "{$fs_data->title}"; ?></h2>
				<div class="description_film">
					<img src="img/<?php echo "{$fs_data->img}"; ?>">
					<?php echo "{$fs_data->article}"; ?>
					
				</div>
				<?php } ?>

				<hr>
				<h2>Отзывы о фильме</h2>
	
				<div class="reviews">
					<?php
					$result = R::getAll("SELECT `users`.`name`, `comments`.`title`, `comments`.`text` FROM `users`, `comments` WHERE `users`.`id` = `comments`.`id_user` AND `comments`.`id_parent` = ? AND `comments`.`category` = 1", array($_GET['id']));
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
						<input type="hidden" name="parent_id" value="<?php echo $_GET['id'] ?>" />
						<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
						<input type="submit" name="new_com_fs" value="Отправить"/>	
					</form>
					
				</div>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>
