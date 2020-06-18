<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
    <script src="public/js/jquery.js"></script>

</head>
<body>
<?php Session::init(); ?>
<div id="header">
        <br>
    <?php if(Session::get('loggedIn') == true):?>
        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    <?php else: ?>
        <a href="<?php echo URL; ?>login">Login</a>
    <?php endif; ?>

</div>
<div id="content"></div>
<h1> header </h1>
<script src="public/js/custom.js"></script>


