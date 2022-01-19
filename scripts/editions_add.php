<?php
# Этот скрипт ориентирован на работу со страницей index.html
# Для других страниц необходимо создать подобные скрипты


# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$title = $_REQUEST['title'];
$isbn = $_REQUEST['isbn'];
$author = $_REQUEST['author'];
$price = $_REQUEST['price'];
$quantity = $_REQUEST['quantity'];
$publication = $_REQUEST['publication'];

$sql = "INSERT INTO editions (title, isbn, author, price, quantity, publicated) VALUES ('$title', $isbn, '$author', $price, $quantity, '$publication')";

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Запись успешно добавлена.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}