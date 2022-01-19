<?php
# Этот скрипт ориентирован на работу со страницей subsctiption.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];
$price = $_REQUEST['price'];
$isbn = $_REQUEST['isbn'];
$act = $_REQUEST['activation'];
$dec = $_REQUEST['decontamination'];

$sql = "INSERT INTO subscriptions (sub_id, isbn, price, activation, decontamination) VALUES ($id, $isbn, $price, '$act', '$dec')";

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Запись успешно добавлена.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}