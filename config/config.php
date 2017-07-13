<?php
	require("db.php");
	@session_start();
	// Основные конфиги
	$config = array(
		'first_title' => 'Киномонстр',
		'second_title' => 'Кино - наша жизнь'
		);

	// Настройка меню по формату: array('название пункта', 'имя файла') 
	$menu_bar = array(
		array('Главная', 'index.php'),
		array('Фильмы', 'films.php'),
		array('Сериалы', 'series.php'),
		array('Рейтинги', 'rating.php'),
		array('Cтатьи', 'articles.php'),
		array('Контакты', 'contact.php')
		);






	