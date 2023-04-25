<?php
$db = mysqli_connect("localhost", "root", "", "authorization_tutorial");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}