<?php
/**
 * Created by PhpStorm.
 * User: yiren
 * Date: 2018-05-14
 * Time: 18:41
 */

if (isset($_POST["submit"])) {

    include("connect.php");
    include("filter.php");
    $email = stringTrim($_POST['email']);
    $password = stringTrim($_POST['password']);
    $confirmPassword = stringTrim($_POST['confirmPassword']);
    $firstName = stringTrim($_POST['firstName']);
    $lastName = stringTrim($_POST['lastName']);
    $streetAddress = stringTrim($_POST['streetAddress']);
    $postalCode = stringTrim($_POST['postalCode']);


    try {
        if ($password == $confirmPassword) {
            //check if the email is already registered
            $query = "select * from users where email = ?";
            $request = $conn->prepare($query);
            $result = $request->execute(array(
                $email
            ));
            //$count = mysqli_num_rows($result);

            $count = $request->rowCount();

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            //if no value was retrieved
            if ($count == 0) {
                $query = "insert into users set email = ?, password = ?, firstName = ?, lastName = ?, streetAddress =?, 
                  postalCode = ?";
                $request = $conn->prepare($query);
                $result = $request->execute(array(
                    $email,
                    $hashedPwd,
                    $firstName,
                    $lastName,
                    $streetAddress,
                    $postalCode
                ));
                if ($request) {
                    $_SESSION['redirect'] = "You have registered successfully!";
                    require_once 'templateSuccess.php';
                    echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>
                ";//if false, redirect to login.html after 1s
                    return;
                }
            } else {
                $_SESSION['error'] = "The email has been registered, please try a new one";
                require_once 'template.php';
                echo "
                    <script>
                            setTimeout(function(){window.location.href='signup.html';},1000);
                    </script>
                ";//if false, redirect to login.html after 1s

            }
        } else {
            $_SESSION['error'] = "Password does not match.";
            require_once 'template.php';
            echo "
                    <script>
                            setTimeout(function(){window.location.href='signup.html';},1000);
                    </script>
                ";//if false, redirect to login.html after 1s


        }
    } catch (PDOException $e) {
        die("Failed to sign up" . $e->getMessage());
    }
}