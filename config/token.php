<?php 
	$_SESSION['token']= "";
	for($i=0; $i<=30; $i++){
		$_SESSION['token'] .= rand(1,50);
	}
	$_SESSION['token'] = md5($_SESSION['token']);