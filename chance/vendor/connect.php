<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'killme');
    if (!$connect) {
        die('Error to connect DataBase');
    }
