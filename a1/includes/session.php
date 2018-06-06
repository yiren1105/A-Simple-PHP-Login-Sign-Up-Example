<?php
session_start();
include('connect.php');

function isLogged() {
    if (!$_SESSION['Username'] == "") {
        header("Location: welcome.php");
        return;
    }
}