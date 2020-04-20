<!DOCTYPE html>
<html>
<head>
	<title>Guest book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="form-group">
		<form method="POST" action="index.php">
			<p>
				<label>Имя:</label><br>
				<input type="text" class="form-control"  name="name" placeholder="Имя" >
			</p>
			<p>
				<label>Фамилия:</label><br>
				<input type="text" class="form-control mb-3"  name="lastname" placeholder="Фамилия" >
			</p>
			
			<p>
				<label>Собщение:</label><br>
			<textarea name="message" class="form-control" placeholder="Сообщение"> </textarea>
			<p>
				<input type="submit" class="btn btn-primary">
			</p>	
		</form>
	</div>
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
	/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	   	$name = $_POST["name"];//
		$lastname = $_POST["lastname"];
		$message = $_POST["message"];
		$query = "INSERT INTO users (name, lastname, message) VALUES (?,?,?)";//
		$stmt = $conn->prepare($query); //подготавливает запрос  к базе данных и возвращает связанный с этим запросом объект
		$stmt->bind_param("sss", $name, $lastname, $message); //Привязка переменных к параметрам подготавливаемого запроса
		$stmt->execute();
			
		//проверка запроса на выполнение
		if (!$stmt->execute()) {
	    echo "Выполнить запрос не удалось: (" . $stmt->errno . ") " . $stmt->error;
		}
	}*/
	//создаём массив ошибок заполнения формы
	$errors = [];

	//проверяем на наличие данных  в форме
	if (!empty($_POST)) {
		if(empty($_POST['name'])) {
			$errors['name'] = "Введите имя";
		}
		if (empty($_POST['lastname'])) {
			$errors['lastname'] = "Введите фамилию";
		}
		if (empty($_POST['message'])) {
			$errors['message'] = "Hello";
		}
		if (!isset($errors)) {
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$message = $_POST['message'];
		$query = "INSERT INTO users (name, lastname, message) VALUES (?,?,?)";
		$stmt = $conn->prepare($query); //подготавливает запрос  к базе данных
		$stmt->bind_param("sss", $name, $lastname, $message); //привязка переменных к параметрам подготавливаемого запроса
		$stmt->execute();//выполняет подготовленный запрос
		} 
		else{
			//перебираем массив ошибок
			foreach($errors as $key => $value) {
			$errors[$key] = $key;
			echo "<h3> Enter: -" . $errors[$key] . '</h3><br>';//выводим ошибки заполнения формы
			}
		}
	}
		
		$sql = "SELECT  name, lastname, message, created_at FROM guest_book.users ORDER BY created_at DESC LIMIT 10";
		$result = $conn->query($sql);//выполнения запроса к базе данных

	//проверяем на наличие данных в БД
	if ($result->num_rows > 0) {
	   // выводим данные каждой строки в виде таблицы
		echo '<table class="table table-striped">';
		echo '<tr><th>Name</th><th>Lastname</th><th>Message</th><th>Created</th><tr>';
		//извлекаем ассоциативный массив в виде таблицы
	   	while($row = $result->fetch_assoc()) {
	   		echo '<tr><td>' . $row['name'] . '</td><td>' . $row['lastname'] .'</td><td>' . $row["message"] . '</td><td>' . $row["created_at"] . '</td></tr>';
	    }
	     echo '</table>';
	} else {
	    echo "0 results";
	}

	//закрываем соединение с БД
	$conn->close();
?>
	
  
</body>
</html>