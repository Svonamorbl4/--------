<?php
# Этот скрипт ориентирован на работу со страницей orders.html

# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$id = $_REQUEST['id'];

# Запрос к таблице изданий
if ($id !== "") {
  $sql = "SELECT * FROM `orders` WHERE ord_id = $id";
}

$res = $db -> query($sql);

    # Проверка записей в таблице
    if ($res -> num_rows > 0) {

        # Цикл будет работать пока не пройдёт все строки;
        # При каждой новой итерации цикла осуществляется переход к следующей записи;
        while ($row = $res -> fetch_assoc()) {
          
          # Вывод запроса
          echo "<p>ID заказа: {$row["ord_id"]} <br> Код служб. дост. : {$row["del_id"]} <br> Оплачено: {$row["price"]} <br> Пункт назначения: {$row["destination"]} <br> Дата доставки: {$row["pur_date"]}</p>";
          #echo "<------------------------------------->\n\n";
        }

      # Если таблица пустая, будет выведено "Данных нет";
      } else {
        echo 'Данные отсутствуют!';
      }