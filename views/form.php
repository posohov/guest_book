<!DOCTYPE html>
<html>
<head>
    <title>Guest book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST" action="./controllers/users.php">
        <p>
            <label>Имя:</label><br>
            <?php
            if (isset($errors['name'])) {
                echo '<div style="color:red;">' . $errors['name'] . '</div>';
            }
            ?>
            <input type="text" class="form-control" name="name"
                   placeholder="<?php echo !empty($errors['name']) ? $errors['name'] : 'Имя' ?>"
                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">

        </p>
        <p>
            <label>Фамилия:</label><br>
            <?php
            if(isset($errors["lastname"])) {
                echo "<div style='color:red;'>" . $errors['lastname'] . '</div>';
            }
            ?>
            <input type="text" class="form-control mb-3" name="lastname"
                   placeholder="<?php echo isset($errors['lastname']) ? $errors['lastname'] : 'Фамилия' ?>"
                   value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '';?>">

        </p>

        <p>
            <label>Собщение:</label><br>
            <textarea name="message" class="form-control" placeholder="Сообщение"> </textarea>
        <p>
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Отправить</button>
        </p>
    </form>
</div>


</body>
</html>