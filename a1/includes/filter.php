<?php

function stringTrim($str) {
    $str = stripslashes($str);
    $str = htmlentities($str);
    return htmlspecialchars(trim($str));
}

