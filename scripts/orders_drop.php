<?php
# Этот скрипт ориентирован на работу со страницей orders.html


# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];

if ($id !== "") {
    $sql = "DELETE FROM orders WHERE ord_id = $id";
}

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Запись успешно удалена.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}