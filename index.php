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
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>

<body>

	<div class="main">

		<?php  require('includes/header.php') ?>

		<div class="site_content">

			<?php require("includes/sidebar.php") ?>

			<div class="content">
				<h1>Новые фильмы</h1>
				<div class="films_block">
					<?php 
						// Выборка 4 самых новых фильмов из базы и формирование ссылок на них
						$result = R::find('films_series', "category = ? ORDER BY year DESC LIMIT 4", array(1));
						foreach($result as $fs_img){
					?>
							<a href="show_film_series.php?id=<?php echo "{$fs_img->id}" ?>"><img src="img/<?php echo "{$fs_img->img}" ?>"></a>
					<?php } ?>
				</div>

				<h1>Новые сериалы</h1>
				<div class="films_block">
					<a href="#"><img src="img/dead.png"></a>
					<a href="#"><img src="img/silicon.png"></a>
					<a href="#"><img src="img/xfiles.png"></a>
					<a href="#"><img src="img/breakingbad.png"></a>
				</div>

				<div class="posts">
					<?php // Выборка 2-х первых статей из базы и формирование ссылок на них
						$result = R::find('articles', "ORDER BY id DESC LIMIT 2");
						foreach($result as $articles){
					?>
					<hr>
					<h2><a href="show_article.php?id_a=<?php echo "{$articles->id}"; ?>"><?php echo "{$articles->title}"; ?></a></h2>
					<div class="posts_content">
						<p>
							<?php echo mb_strimwidth("{$articles->article}", 0, 300, "..."); ?>
						</p>
					</div>
					<p><a href="show_article.php?id_a=<?php echo "{$articles->id}"; ?>">Читать</a></p>
					<hr>
					<?php } ?>
				</div>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>
