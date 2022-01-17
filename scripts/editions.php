<?php
# Этот скрипт ориентирован на работу со страницей index.html
# Для других страниц необходимо создать подобные скрипты


# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$title = $_REQUEST['title'];
$isbn = $_REQUEST['isbn'];
$author = $_REQUEST['author'];
$price = $_REQUEST['price'];

# Запрос к таблице изданий
#$sql = "SELECT * FROM `editions` WHERE author LIKE '%$author%'";
#$sql = "SELECT * FROM `editions` WHERE title LIKE \"%{$title}%\" OR isbn = $isbn OR author LIKE \"%{$author}%\" OR price = $price";
if ($title !== "") {
  $sql = "SELECT * FROM `editions` WHERE title LIKE '%$title%'";
}
elseif ($isbn !== "") {
  $sql = "SELECT * FROM `editions` WHERE isbn = $isbn";
}
elseif ($author !== "") {
  $sql = "SELECT * FROM `editions` WHERE author LIKE '%$author%'";
}
elseif ($price !== "") {
  $sql = "SELECT * FROM `editions` WHERE price = $price";
}
else {
  $sql = "SELECT * FROM `editions`";
}

# Отправка запроса
$res = $db -> query($sql);

    # Проверка записей в таблице
    if ($res -> num_rows > 0) {

        # Цикл будет работать пока не пройдёт все строки;
        # При каждой новой итерации цикла осуществляется переход к следующей записи;
        while ($row = $res -> fetch_assoc()) {
          
          # Вывод запроса
          echo "<p>Название: {$row["title"]} <br> Автор: {$row["author"]} <br> ISBN: {$row["isbn"]} <br> Цена: {$row["price"]} руб</p>";
          #echo "<------------------------------------->\n\n";
        }

      # Если таблица пустая, будет выведено "Данных нет";
      } else {
        echo 'Данные отсутствуют!';
      }