<?php
// стартуем сессии, для того чтобы мы могли пользоваться глобальным массивом SESSION, для передачи ошибок
session_start();
require_once("./db/db.php");
?>
<link rel="stylesheet" href="main.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<style>
body {
    background:rgb(130,130,130);
    background-size: cover;
   
} 
</style>
<body>
    
    <div style="background: rgb(255,165,100);" class="form">
    <br>
    <h1 style="color:#000;">Авторизация</h1>
    
    <!-- 
        в параметре action, указываем относительный путь до файла обработчика, 
        который будет принимать все запросы от этой формы, а в параметре method, 
        указываем метод отправки данных в файл 
    -->
    
    <form action="./vendor/log.php" method="post">
        
        <input type="text" name="login" placeholder="Логин" required>
        <br>
        <br>
        <input type="password" name="password" placeholder="Пароль" required> 
    
        
        <br>
        <br>
        <div class="button">
        <input type="submit" value="Войти">
    </div>
    </div>
    </form>
<br>
    <?php
    // если не сделает данной проверки, (что если данная переменная в глобальном массиве массиве, пустая,
    // то будет выводиться, иначе будет выводиться содержимое), 
    // то будет выведеная ошибка, что данная переменная не найдена
	if (($_SESSION['ErrMes'] ?? '') === ''); else {
	    print_r($_SESSION['ErrMes']);
        // закрываем сессию, чтобы сообщение об ошибке убиралось после перезагрузки страницы
		session_destroy();
	}
    ?>
    
</body>
</html>