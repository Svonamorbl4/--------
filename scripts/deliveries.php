<?php
# Этот скрипт ориентирован на работу со страницей deliveries.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$title = $_REQUEST['title'];
$price = $_REQUEST['price'];

# Запрос к таблице изданий
if ($title !== "") {
  $sql = "SELECT * FROM `delivery` WHERE title LIKE '%$title%'";
}
elseif ($price !== "") {
  $sql = "SELECT * FROM `delivery` WHERE price = $price";
}
else {
  $sql = "SELECT * FROM `delivery`";
}


$res = $db -> query($sql);

    # Проверка записей в таблице
    if ($res -> num_rows > 0) {

        # Цикл будет работать пока не пройдёт все строки;
        # При каждой новой итерации цикла осуществляется переход к следующей записи;
        while ($row = $res -> fetch_assoc()) {
          
          # Вывод запроса
          echo "<p>Id службы доставки: {$row["del_id"]} <br> Название организации: {$row["title"]} <br> Стоимость услуг: {$row["price"]} <br> Сроки доставки: {$row["term"]} дней</p>";
          echo "<------------------------------------------------------------------>\n\n";
        }

      # Если таблица пустая, будет выведено "Данных нет";
      } else {
        echo 'Данные отсутствуют!';
      }