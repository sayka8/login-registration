<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "authorization_tutorial");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='{$login}'");
if (mysqli_num_rows($query) == 0) {
    $_SESSION['user'] = ['nick' => $login];
    mysqli_query($db, "INSERT INTO `users` (`login`, `password`) VALUES ('{$login}', '{$md5_password}')");
    header("Location: /user.php");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
}
