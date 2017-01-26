<?php

session_start();
// checks if there is an active session, if no go to index, if yes go to home
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
} else if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
// if logout is selected, exit the session and go to index
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("Location: index.php");
}
