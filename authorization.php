<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "authorization_tutorial");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='{$login}' AND `password`='{$md5_password}'");
if (mysqli_num_rows($query) == 1) {
    $_SESSION['user'] = ['nick' => $login];
    header("Location: /user.php");
} else {
    echo("Ошибка: Данный логин или пароль неправильны.");
}