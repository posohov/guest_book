<!DOCTYPE html>
<html>
<head>
	<title>Guest book</title>
</head>
<body>
	<form method="POST" action="index.php">
		<p>
			<label>Имя:</label><br>
			<input type="text" name="name" placeholder="Имя" required="">
		</p>
		<p>
			<label>Фамилия:</label><br>
			<input type="text" name="lastname" placeholder="Фамилия" required="">
		</p>
		
		<p>
			<label>Собщение:</label><br>
		<textarea name="message" placeholder="Сообщение"> </textarea>
		<p>
			<input type="submit">
		</p>	
	</form>
	<?php
	//открываем соединение с базой данных и получаем обьект соединения с базой данных
	$conn = mysqli_connect("localhost", "root", "", "guest_book");
	//устанавливаем кодировку символов "utf8"
	mysqli_set_charset($conn, "utf8");

	//проверяем соединение к базе данных, если нет соединения, то выводим описание ошибки соединения  и закрываем скрипт
	if(!$conn) {
		die("Не удалось подключиться к базе данных" . mysqli_connect_error());
	}
	//проверяем метод запроса POST и делаем запрос к базе данных	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$name = $_POST["name"];
		$lastname = $_POST["lastname"];
		$message = $_POST["message"];
		$query = "INSERT INTO users (name, lastname, message) VALUES (?,?,?)";
		$stmt = $conn->prepare($query); //подготавливает запрос  к базе данных
		$stmt->bind_param("sss", $name, $lastname, $message); //выполнения запроса
		
		//проверка запроса на выполнение
		if (!$stmt->execute()) {
    	echo "Выполнить запрос не удалось: (" . $stmt->errno . ") " . $stmt->error;
		}
	}

	$sql = "SELECT  name, message, created_at FROM users ORDER BY created_at DESC";
	$result = $conn->query($sql);

	//проверяем на наличие данных в БД
	if ($result->num_rows > 0) {
    // выводим данные каждой строки
    	while($row = $result->fetch_assoc()) {
        	echo "Name: " . $row["name"]. " - Message: " . $row["message"]. " Created_at " . $row["created_at"] . "<br>";
    	}
	} else {
    	echo "0 results";
	}

	//закрываем соединение с БД
	$conn->close();

	?>

</body>
</html>