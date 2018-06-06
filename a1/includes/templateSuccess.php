<?php
$redirect = $_SESSION['redirect'];

?>

    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Something is wrong</title>
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

    <div class="header">
        <h1>Redirecting...</h1>
    </div>
    <div class="main">

        <p><?php echo $error;?></p>
        <button class="button button1" name="submit" type="submit" onclick="{location.href='login.html'}">Login</button>

    </div>

    </body>
    </html>

<?php
session_destroy();