<?php
/**
 * Created by PhpStorm.
 * User: yiren
 * Date: 2018-05-15
 * Time: 15:49
 */
//if(isset($_POST["submit"])) {
    include ('session.php');
    include "filter.php";

    isLogged();
    error_reporting(0);

    $username = stringTrim($_POST['username']);
    $password = stringTrim($_POST['password']);
    try {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        //sql
        $query = "select * from users where email = ? ";
        //against SQL injections
        //prepare sql
        $request = $conn->prepare($query);
        $result = $request->execute(array(
            $username
        ));
        $count = $request->rowCount();
        $user = $request->fetch(PDO::FETCH_ASSOC);
        if ($count < 1) {
            $_SESSION['error'] = "This username doesn't exist.";
            require_once 'template.php';
        } else{
            $hashCheck = password_verify($password, $user['password']);
            if ($hashCheck == true){
                $_SESSION['Username'] = $username;
                $_SESSION['FirstName'] = $user['firstName'];
                header("Location: welcome.php");
                exit;
            }else {
                $_SESSION['error'] = "Username or password is incorrect.";
                require_once 'template.php';

            }

        }

    } catch (PDOException $e) {
        die("Error!!" . $e->getMessage());
    }
//} else{
//    echo "failed to submit!";
//}

