<?php
include('db.php');
$sql = "SELECT  name, lastname, message, created_at FROM guest_book.users ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);//выполнения запроса к базе данных


?>