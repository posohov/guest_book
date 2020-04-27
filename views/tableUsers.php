<?php
//проверяем на наличие данных в БД
if ($result->num_rows > 0) {
    // выводим данные каждой строки в виде таблицы
    echo '<table class="table table-striped"><tr><th>Name</th><th>Lastname</th><th>Message</th><th>Created</th><tr>';
    //извлекаем ассоциативный массив в виде таблицы
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['name'] . '</td><td>' . $row['lastname'] .'</td><td>' . $row["message"] . '</td><td>' . $row["created_at"] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
?>