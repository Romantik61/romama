<?php
// Создаём отдельную страницу для изменения данных в таблице в подключением к БД
require_once("./db/db.php");
$detali_id=$_GET['id'];
$detali = mysqli_query($link,"SELECT * FROM `detali` WHERE `id` = '$detali_id'");
$detali = mysqli_fetch_assoc($detali);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение записи</title>
</head>
<style>
    H2 {
    -webkit-text-stroke: 0.3px black;
    text-shadow:
    1px 1px #000,
    2px 2px #000;
    color: #fff;
}

    body{
    background-size: cover;
    }
    .forma{
    background:rgb(255,165,100);
    height: 440px;
    width: 270px;
    margin: 40px 0 0 50px;
    justify-items: center;
    text-align: center;
    border-radius: 15px;
    box-shadow: 10px 10px 10px 2px rgba(7, 12, 16, 0.2) inset;
    border: 4px double black;
    }
    input{
    border-radius: 5px;
    width: 70%;
    height: 35px;
    border: 4px double black;
    }
    select{
    border-radius: 5px;
    width: 75%;
    height: 40px;
    border: 4px double black;
    }
</style>
<div class="forma">
<body>
<h2 style="padding-top:7px;">Изменение данных о деталях</h2>
<form  action="./vendor/update_detali.php" method="post">
<input type="hidden" name="ID" value="<?=$detali['ID']?>">
<input type="text" name="name" value="<?= $detali['name'] ?>">
<br>
<br>
<input type="text" name="price" value="<?=$detali['price']?>">
<br>
<br>
<input type="text" name="amount" value="<?=$detali['amount']?>">
<br>
<br>
<input style="width: 50%;" type="submit" value="Изменить">
<br>
</form>
</div>
</body>
</html>
