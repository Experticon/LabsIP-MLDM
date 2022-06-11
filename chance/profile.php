<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesIn.css" type="text/css">
    <link rel="stylesheet" href="styles/autocss.css" type="text/css">
    <title>Мини-сайт</title>
</head>
<body>
<header class="containHeader">
    <div class="logo">
        <a href="index.html">
            <img class="logoimg" src="/images/logo.jpg">
        </a>
    </div>
    <div class="gallery">
        <a href="gallery.html">
            <img class="galimg" src="/images/galler.jpg">
        </a>
    </div>
    <div>
        <a href="reg.php" class="autorization">Регистрация</a>
        <a href="auto.php" class="autorization">Авторизация</a>
    </div>
</header>
<div class="forms">

    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" >
        <h2><?= $_SESSION['user']['full_name'] ?></h2>
        <a href=""><?= $_SESSION['user']['email'] ?></a>
    </form>
    </div>
</body>
</html>
