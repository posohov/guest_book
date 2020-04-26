<!DOCTYPE html>
<html>
<head>
    <title>Guest book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="form-group">
    <form method="POST" action="./controllers/users.php">
        <p>
            <label>Имя:</label><br>
            <input type="text" class="form-control"  name="name" placeholder="<?php echo isset($errors['name']) ? $errors['name'] : 'Имя1' ?>" value="<?php echo isset($_POST['name']) ? $_POST['name']: ''; ?>">
      <?php
        if(isset($errors['name'])) {
            echo '<div style="color:red;">' . $errors['name'] . '</div>';
        }
      ?>
        </p>
        <p>
            <label>Фамилия:</label><br>
            <input type="text" class="form-control mb-3"  name="lastname" placeholder="Фамилия" >

        </p>

        <p>
            <label>Собщение:</label><br>
            <textarea name="message" class="form-control" placeholder="Сообщение"> </textarea>
        <p>
            <input type="submit" name="submit" class="btn btn-primary">
        </p>
    </form>
</div>


</body>
</html>