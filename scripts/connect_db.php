<?php
# Подключение к базе данных
$db = mysqli_connect("localhost", "root", "_Qeadzc90", "books");  # сервер, пользователь, пароль, база данных

$price = 700;   // Цена для условия фильтрации

# Список тестовых запросов к базе данных
#$sql = "SELECT * FROM `delivery`";
$sql = "SELECT `title`, `price` FROM `editions` WHERE price <= $price";
#$sql = "SELECT `title`, `price` FROM `editions_orders` JOIN `orders` ON `ord_id` = `ord_id` JOIN `editions` ON `isbn` = `isbn`";

# Отправка запроса
$res = $db -> query($sql);

    # Проверка записей в таблице
    if ($res -> num_rows > 0) {

        # Цикл будет работать пока не пройдёт все строки;
        # При каждой новой итерации цикла осуществляется переход к следующей записи;
        while ($row = $res -> fetch_assoc()) {
          
          # Вывод запроса
          #echo "id службы: {$row["title"]} \nИмя организации: {$row["title"]} \nСтоимость доставки: {$row["title"]} \nСрок доставки (дней): {$row["term"]}\n";
          #echo "Название книги: {$row["title"]} \nСтоимость книги: {$row["price"]} руб\n";
          echo "Название книги: {$row["title"]} \nСтоимость книги с доставкой: {$row["price"]} руб\n";
          echo "<------------------------------------->\n\n";
        }

      # Если таблица пустая, будет выведено "Данных нет";
      } else {
        echo "Данные отсутствуют!";
      }