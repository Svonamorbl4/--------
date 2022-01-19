<?php
# Этот скрипт ориентирован на работу со страницей  deliveries.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];
$price = $_REQUEST['price'];
$title = $_REQUEST['title'];
$term = $_REQUEST['term'];

$sql = "INSERT INTO delivery (del_id, title, price, term) VALUES ($id, '$title', $price, $term)";

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Запись успешно добавлена.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}