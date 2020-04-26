<?php
require ("db.php");

$query = "INSERT INTO users (name, lastname, message) VALUES (?,?,?)";
$stmt = $conn->prepare($query); //подготавливает запрос  к базе данных
$stmt->bind_param("sss", $name, $lastname, $message); //привязка переменных к параметрам подготавливаемого запроса
$result = $stmt->execute();//выполняет подготовленный запрос

?>