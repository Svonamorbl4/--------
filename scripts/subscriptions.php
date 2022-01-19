<?php
# Этот скрипт ориентирован на работу со страницей subsctiption.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];
$price = $_REQUEST['price'];

# Запрос к таблице изданий
if ($id !== "") {
  $sql = "SELECT * FROM `subscriptions` WHERE sub_id = $id";
}
elseif ($price !== "") {
  $sql = "SELECT * FROM `subscriptions` WHERE price = $price";
}
else {
  $sql = "SELECT * FROM `subscriptions`";
}


$res = $db -> query($sql);

    # Проверка записей в таблице
    if ($res -> num_rows > 0) {

        # Цикл будет работать пока не пройдёт все строки;
        # При каждой новой итерации цикла осуществляется переход к следующей записи;
        while ($row = $res -> fetch_assoc()) {
          
          # Вывод запроса
          echo "<p>ID: {$row["sub_id"]} <br> isbn: {$row["isbn"]} <br> Цена: {$row["price"]} <br> Начало: {$row["activation"]} <br> Конец: {$row["decontamination"]}</p>";
          #echo "<------------------------------------->\n\n";
        }

      # Если таблица пустая, будет выведено "Данных нет";
      } else {
        echo 'Данные отсутствуют!';
      }