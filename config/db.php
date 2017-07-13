<?php
	// $db = mysqli_connect('localhost', 'root', '', 'kinomonstr');

	// if( $db == false ){
	// 	echo "Подключение к базе отстуствует!";
	// 	echo mysqli_connect_error();
	// 	exit();
	// }

	$filename = 'libs/rb.php';
	if (file_exists($filename)){
		require("libs/rb.php");
	}else{
		require("../libs/rb.php");
	}
 	R::setup( 'mysql:host=127.0.0.1; dbname=kinomonstr', 'root', '' );
 	if( !R::testConnection() )
 	{
 		echo "Ошибка соединения с БД!!";
 	}