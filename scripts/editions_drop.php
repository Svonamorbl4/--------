<?php
# Этот скрипт ориентирован на работу со страницей index.html
# Для других страниц необходимо создать подобные скрипты


# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$title = $_REQUEST['title'];
$isbn = $_REQUEST['isbn'];
$author = $_REQUEST['author'];
$price = $_REQUEST['price'];

if ($title !== "") {
    $sql = "DELETE FROM editions WHERE title LIKE'%$title%'";
  }
  elseif ($isbn !== "") {
    $sql = "DELETE FROM editions WHERE isbn  = $isbn";
  }
  elseif ($author !== "") {
    $sql = "DELETE FROM editions WHERE author LIKE'%$author%'";
  }
  elseif ($price !== "") {
    $sql = "SELECT * FROM editions WHERE price = $price";
  }
  else {
    $sql = "SELECT * FROM `editions`";
  }

# Вывод сообщения об успехе / неудачи операции
if(mysqli_query($db, $sql)){
    echo "Записи успешно удалены.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}

echo $sql;