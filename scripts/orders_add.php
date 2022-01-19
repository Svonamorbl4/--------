<?php
# Этот скрипт ориентирован на работу со страницей orders.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];
$did = $_REQUEST['delivery'];
$price = $_REQUEST['price'];
$dest = $_REQUEST['destination'];
$purDate = $_REQUEST['purDate'];

$sql = "INSERT INTO orders (ord_id, del_id, price, destination, pur_date) VALUES ($id, $did, $price, '$dest', '$purDate')";

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Запись успешно добавлена.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}