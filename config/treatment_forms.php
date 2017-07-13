<?php
	require('config.php');

	session_start();
	$data = $_POST; 
	unset($_SESSION['error']);
	unset($_SESSION['success']);
	//print_r($_POST);


	// Если нажата кнопка "Зарегистрироваться"
    if(isset($data['reg_us'])){
        $errors = array();

        if(($data['name'] ) == ''){
            $errors[] = 'Введите имя';
        }

        if(trim($data['login'] ) == ''){
            $errors[] = 'Введите логин!';
        }

        if(($data['password_1'] ) == ''){
            $errors[] = 'Введите пароль!';
        }

        if(($data['password_1'] ) != $data['password_2']){
            $errors[] = 'Повторный пароль введен не верно!';
        }

        if(R::count('users', "login = ?", array($data['login']))
            >0){
            $errors[] = 'Пользователь с данным логином уже существует!';
        }

        if(R::count('users', "email = ?", array($data['mail']))
            >0){
            $errors[] = 'Пользователь с данным Email уже существует!';
        }

        if(trim($data['email'] ) == ''){
            $errors[] = 'Введите email';
        }

        if($data['token'] != $_SESSION['token']){
        	$errors[] = 'Вы стали жертвой мошенников и пытались отправить данные со стороннего ресурса!';
        }

        if(empty($errors)){
            $user = R::dispense('users');
            $user->name = $data['name'];
            $user->login = $data['login'];
            $user->mail = $data['email'];
            $user->password = md5($data['password_1']);
            R::store($user);
           	$_SESSION['success'] = "Вы успешно зарегистрировались!";
            unset($_POST);
            header("location: ../reg.php");
        }
        else{
            $_SESSION['error'] = array_shift($errors);
            header("location: ../reg.php");
        }   
	}


    // Если нажата кнопка "Авторизоваться"
	if(isset($data['auth_us'])){
		$errors = array();

        if(trim($data['login'] ) == ''){
            $errors[] = 'Введите логин!';
        }

        if(trim($data['password'] ) == ''){
            $errors[] = 'Введите пароль!';
        }

        if(R::count('users', "login = ?", array($data['login'])) == 0){
            $errors[] = 'Пользователя с таким логином не сушествует';
         }

        if($data['token'] != $_SESSION['token']){
         	$errors[] = 'Вы стали жертвой мошенников и пытались отправить данные со стороннего ресурса!';
        }

		$userData = R::find('users', "login = ?", array($data['login']));
        foreach ($userData as $user) {
    		$user_password = "{$user->password}";
        }

        if($user_password != md5($data['password'])){
        	$errors[] = 'Неверный пароль!';
        	unset($userData);
        }

        if(empty($errors)){
        	foreach ($userData as $user) {
        		$_SESSION['userData'] =  array(
                'userId' => "{$user->id}",   
    			'userLogin' => "{$user->login}",
    			'userName' => "{$user->name}",
    			'userEMail' => "{$user->mail}",
    			'userPriority' => "{$user->priority}"
    			);
        	}
            unset($_POST);
            header("location: ../index.php");
        }
        else{
            $_SESSION['error'] = array_shift($errors);
            header("location: ../auth.php");
        }   
	}


    // Если нажата кнопка выхода из польователя
    if(isset($data['exit_us'])){
        unset($_SESSION['userData']);
        header("location: ../index.php");
    }


    if(isset($data['new_com_fs'])){
        $errors = array();

        if($data['token'] != $_SESSION['token']){
            $errors[] = 'Вы стали жертвой мошенников и пытались отправить данные со стороннего ресурса!';
        }
        if(empty($errors)){
            $comment = R::dispense('comments');
            $comment->id_user = $_SESSION['userData']['userId'];
            $comment->category = 1;
            $comment->id_parent = $data['parent_id'];
            $comment->title = $data['title_comment'];
            $comment->text = $data['review_text'];
            R::store($comment);
            $parent_id = $data['parent_id'];
            unset($_POST);
            ?>
            <meta http-equiv="refresh" content="0; url=../show_film_series.php?id=<?php echo $parent_id ?>">
            <?php
        }else{
            $_SESSION['error'] = array_shift($errors);
            ?>
            <meta http-equiv="refresh" content="0; url=../show_film_series.php?id=<?php echo $parent_id ?>">
            <?php    
        }
    }

    if(isset($data['new_com_art'])){
        $errors = array();

        if($data['token'] != $_SESSION['token']){
            $errors[] = 'Вы стали жертвой мошенников и пытались отправить данные со стороннего ресурса!';
        }
        if(empty($errors)){
            // echo $data['parent_id'];
            // exit();
            $comment = R::dispense('comments');
            $comment->id_user = $_SESSION['userData']['userId'];
            $comment->category = 0;
            $comment->id_parent = $data['parent_id'];
            $comment->title = $data['title_comment'];
            $comment->text = $data['review_text'];
            R::store($comment);
            $parent_id = $data['parent_id'];
            ?>
            <meta http-equiv="refresh" content="0; url=../show_article.php?id_a=<?php echo $parent_id ?>">
            <?php
        }else{
            $_SESSION['error'] = array_shift($errors);
            ?>
            <meta http-equiv="refresh" content="0; url=../show_article.php?id_a=<?php echo $parent_id ?>">
            <?php    
        }
    }
