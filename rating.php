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
				
			<table>
				<tr>
					<th></th>
					<th>Фильм</th>
					<th class="center">Год</th>
					<th class="center">Рейтинг</th>
				</tr>
				<tr>
					<td class="center"><img src="img/inter.png"></td>
					<td>1. <a href="show.html">Интерстеллар</a></td>
					<td class="center">2014</td>
					<td class="center rating">8.1</td>
				</tr>
				<tr>
					<td class="center"><img src="img/matrix.png"></td>
					<td>2. <a href="show.html">Матрица</a></td>
					<td class="center">1999</td>
					<td class="center rating">8.0</td>
				</tr>
				<tr>
					<td class="center"><img src="img/cloud.png"></td>
					<td>3. <a href="show.html">Облачный атлас</a></td>
					<td class="center">2013</td>
					<td class="center rating">7.4</td>
				</tr>
				<tr>
					<td class="center"><img src="img/max.png"></td>
					<td>4. <a href="show.html">Безумны Макс</a></td>
					<td class="center">2015</td>
					<td class="center rating">7.5</td>
				</tr>
				
			</table>

			</div>

		</div>

		<?php require("includes/footer.php") ?>

	</div>
	<?php require("includes/scripts.php"); ?>
</body>
</html>
