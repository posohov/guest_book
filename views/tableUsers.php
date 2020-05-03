<!DOCTYPE html>
<html>
<head>
    <title>Guest book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
//проверяем на наличие данных в БД
if ($result->num_rows > 0) {
    // выводим данные каждой строки в виде таблицы
    echo '<table class="table table-striped"><tr><th>Name</th><th>Lastname</th><th>Message</th><th>Created</th><tr>';
    //извлекаем ассоциативный массив в виде таблицы
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['name'] . '</td><td>' . $row['lastname'] . '</td><td>' . $row["message"] . '</td><td>' . $row["created_at"] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
include("../models/button.php");

?>

