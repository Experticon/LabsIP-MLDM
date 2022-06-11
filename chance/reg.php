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
    <div class="forms2">

    <form action="/vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите своё полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Войти</button>
        <p class="litext">Уже есть аккаунт? - <a class="perehod"href="auto.php"> Войдите...</a></p>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg">' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </p>

    </form>
    </div>


</body>
</html>
