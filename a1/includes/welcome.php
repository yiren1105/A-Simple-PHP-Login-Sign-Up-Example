<?php
include "session.php";
$user = $_SESSION['Username'];
$fname = $_SESSION['FirstName'];

unset($_SESSION['Username']);
unset($_SESSION['FirstName']);
?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Welcome </title>
    <link href="../css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="header">
    <h1>Hello
        <?php
        //echo $user;
        echo $fname;
        ?></h1>
</div>
<div class="main">

    <p>You have logged in.</p>
    <button class="button button1" name="submit" type="submit" onclick="{location.href='login.html'}">Log out</button>

</div>

</body>
</html>