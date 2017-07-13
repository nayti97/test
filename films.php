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
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>

<body>
	<div class="main">

		<?php require('includes/header.php') ?>

		<div class="site_content">

			<?php require("includes/sidebar.php") ?>

			<div class="content">
				<div class="search_content">
					<input type="search" name="search_film_series" placeholder="Поиск по фильмам" class="search_f_s"/>
					<input type="submit" name="search_fs_sub" value="Поиск"/>
				</div>
				<?php 
					// Постраничный вывод фильмов из базы( по 3 на одной странице )
					if(!isset($_GET['strt']))
					{
						$_GET['strt'] = 0;
					}
					echo gettype($_GET['strt']); 
					$g_strt = $_GET['strt']*2/2;
					$g_end = $g_strt + 3;

					$result = R::find('films_series', "`category` = ? ORDER BY `year` DESC LIMIT ?, ? ", array(
						1,
						$g_strt,
						$g_end
						));
					$count_result = R::count('films_series', "`category` = 1");
					$count_str = ceil($count_result/3);

					foreach($result as $fs_data){
				?>		
						<div class="info_film">
							<img src="img/<?php echo "{$fs_data->img}" ?>">
							<?php echo mb_strimwidth("{$fs_data->article}", 0, 270, "..."); ?>
							
							<div class="button"><a href="show_film_series.php?id=<?php echo "{$fs_data->id}" ?>">Смотреть</a></div>
						</div>
						<center>
							<?php }
							$i = 1;
							$strt = 0;
							for($count_str; $count_str>0; $count_str--){ ?>
								<a href="films.php?strt=<?= $strt ?>"><?= $i ?></a>
							<?php 
								$i++;
								$strt += 3;
								 } ?>
					 	</center>
			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>
