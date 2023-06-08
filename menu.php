<?php 
// Подключаем БД
require_once("./db/db.php");
?>
<link rel="stylesheet" href="main.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style type="text/css">
        th,td{
            padding: 10px;
            border: 4px ridge black;
        }
        th{
            background: rgb(255,165,100);
            color: #000;
        }
        td{
            background: rgb(255,130,0);
            color: #000;
        }
body {
    background:rgb(130,130,130);
} 

.lok{
    width: 30%;
    float:left;
    justify-items: center;
    text-align: center;
}
.tabs { width: 100%; padding: 0px; margin: 0 auto;}
.tabs>input { display: none;}
.tabs>div {
    display: none;
    padding: 12px;
    border: 1px solid #C0C0C0;
    background-size: cover;
    height:90%;
}
.tabs>label {
    display: inline-block;
    padding: 7px;
    margin: 0 -5px -1px 0;
    text-align: center;
    color: #666666;
    border: 1px solid #C0C0C0;
    background: #E0E0E0;
    cursor: pointer;
}
.tabs>input:checked + label {
    border: 1px solid #C0C0C0;
    border-bottom: 1px solid #FFFFFF;
    background: #FFFFFF;
}


.button{
    padding-left: 1685px;
    padding-top: 650px;
    width:  200px;
}

#tab_1:checked ~ #txt_1,
#tab_2:checked ~ #txt_2,
#tab_3:checked ~ #txt_3{ display: block; }
</style>
</head>
<?php
    // Создаём вкладки на странице
?>
<body link=#000>
<div class="tabs">
    <input type="radio" name="inset" value="" id="tab_1" checked >
    <label for="tab_1">Наряды</label>

    <input type="radio" name="inset" value="" id="tab_2">
    <label for="tab_2">Сотрудники</label>

    <input type="radio" name="inset" value="" id="tab_3">
    <label for="tab_3">Склад</label>


    <?php
    // В первой вкладке у нас находятся наряды, выводим таблицу из БД
    // Добавляем запись наряда которая будет добавлять новые данные в БД
?>
    <div id="txt_1">
        <div class="lok">
    <h2 class="txt" style="font-family:Cambria;">Запись наряда</h2>
<form action="vendor/naryadi.php" method="post">
<input class="menu" type="text" name="ownercar"     placeholder="Машина">
<br>
<br>
<input class="menu" type="text" name="ownerproblem" placeholder="Поломка">
<br>
<br>
<input class="menu" type="text" name="price"        placeholder="Цена ремонта">
<br>
<br>
<input class="menu" type="text" name="ownername"    placeholder="Владелец машины">
<br>
<br>
<input class="menu" type="text" name="ownerphone"   placeholder="Номер владельца">
<br>
<br>
<input class="button2" type="submit" value="Записать">
<br>
</div>
<br>
    <div>
        <table>
            <tr>
                <th>Машина</th>
                <th>Поломка</th>
                <th>Цена ремонта</th>
                <th>Владелец машины</th>
                <th>Номер владельца</th>
</tr>
<?php
    $naryadi = mysqli_query($link, "SELECT * FROM `naryadi` ORDER BY `id` DESC");
    $naryadi = mysqli_fetch_all($naryadi);
    foreach ($naryadi as $naryadi) {
    ?>
<tr>
    <td><?= $naryadi[1] ?></td>
    <td><?= $naryadi[2] ?></td>
    <td><?= $naryadi[3] ?></td>
    <td><?= $naryadi[4] ?></td>
    <td><?= $naryadi[5] ?></td>
    <td><a href="update_naryadi.php?id=<?=$naryadi[0] ?>">Изменить</a></td>
    <td><a href="vendor/delete_naryadi.php?id=<?=$naryadi[0] ?>">Удалить</a></td>
</tr>
<?php
    }
    
?>

</table>
</form>
</div>
</div>

<?php
    // Во второй вкладке у нас находятся сотрудники, выводим таблицу из БД
    // Добавляем запись сотрудников которая будет добавлять новые данные в БД
?>

<div id="txt_2">
<div>
<div class="lok">
    <h2 class="txt" style="font-family:Cambria;">Добавление нового сотрудника</h2>
<form action="vendor/sotrydniki.php" method="post">
<input class="menu" type="text" name="fio"    placeholder="ФИО">
<br>
<br>
<input class="menu" type="text" name="login"    placeholder="Логин">
<br>
<br>
<input class="menu" type="text" name="password"    placeholder="Пароль">
<br>
<br>
<select id="selectvalue" style="height: 4%;"class="menu" name="role" placeholder="Роль">
<option>Главный администратор</option>
<option>Механик</option>
<option>Автослесарь</option>
</select>
<br>
<br>
<input class="menu" type="text" name="phone" placeholder="Номер телефона">
<br>
<br>
<input class="button2" type="submit" value="Добавить">
<br>
</div>
        <table>
            <tr>
                <th>ФИО</th>
                <th>Роль</th>
                <th>Номер телефона</th>
            </tr>
<?php
    $sotrydniki = mysqli_query($link, "SELECT * FROM `sotrydniki` ORDER BY `id` DESC");
    $sotrydniki = mysqli_fetch_all($sotrydniki);
    foreach ($sotrydniki as $sotrydniki) {
?>
<tr>
    <td><?= $sotrydniki[1] ?></td>
    <td><?= $sotrydniki[4] ?></td>
    <td><?= $sotrydniki[5] ?></td>
    <td><a href="update_sotrydniki.php?id=<?=$sotrydniki[0] ?>">Изменить</a></td>
    <td><a href="vendor/delete_sotrydniki.php?id=<?=$sotrydniki[0] ?>">Удалить</a></td>
</tr>

<?php
    }  
?>

</table>
<br>
</form>
<form action="./index.php" method="post">      
    <div class="button">
        <input type="submit" value="Выйти из аккаунта">
    </div>

</form>
</div>
</div>

<?php
    // В третьей вкладке у нас находятся детали, выводим таблицу из БД
    // Добавляем запись деталей которая будет добавлять новые данные в БД
?>

<div id="txt_3">
<div>
<div class="lok">
    <h2 class="txt" style="font-family:Cambria;">Добавление деталей на склад</h2>
<form action="vendor/detali.php" method="post">
<input class="menu" type="text" name="name"     placeholder="Название детали">
<br>
<br>
<input class="menu" type="text" name="price" placeholder="Цена">
<br>
<br>
<input class="menu" type="text" name="amount"        placeholder="Количество на складе">
<br>
<br>
<input class="button2" type="submit" value="Добавить">
<br>
</div>
        <table>
            <tr>
                <th>Деталь</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
<?php
    $detali = mysqli_query($link, "SELECT * FROM `detali` ORDER BY `id` DESC");
    $detali = mysqli_fetch_all($detali);
    foreach ($detali as $detali) {
?>
<tr>
    <td><?= $detali[1] ?></td>
    <td><?= $detali[2] ?></td>
    <td><?= $detali[3] ?></td>
    <td><a href="update_detali.php?id=<?=$detali[0] ?>">Изменить</a></td>
    <td><a href="vendor/delete_detali.php?id=<?=$detali[0] ?>">Удалить</a></td>
</tr>
<?php
    }  
?>

</table>
</form>
</div>   
</div>



</div>
</body>
</html>