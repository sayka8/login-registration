<?php
session_start();
if (isset($_SESSION['user'])) {
    echo("You are loggen in as " . $_SESSION['user']['nick']);
} else {
    echo("You are not authorized.");
}