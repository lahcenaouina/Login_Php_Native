<?php
require_once "functions.inc.php";



if (isset($_GET["submit"])) {


    if (emptyinsert($_GET["email"]) == false) {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "localhost/resetpass/create-new-password.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);
        //exprie date for token
        $expires = date("U") + 1800;

        require 'dbh.inc.php';

        $emailuser = $_GET["email"];
        //delete to avoid duplicate tokens
        $sql = 'DELETE FROM pwdreset WHERE pwdResetEmail=?';

        require 'dbh.inc.php';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt , $sql)) {
            echo "The server Database is down please come later :)";
            exit();

        }else {
            mysqli_stmt_bind_param($stmt, "s" , $emailuser);
            mysqli_stmt_execute($stmt);
        }
        // then ansert new token

        $sql = 'INSERT INTO pwdreset(pwdResetEmail , pwdResetSelector , pwdResetToken , pwdResetExpries) VALUES (?,?,?,?) ';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt , $sql)) {

            echo "The server Database is down please come later :)";
            exit();

        }else {
            $hashedToken = password_hash($token ,PASSWORD_DEFAULT);


            mysqli_stmt_bind_param($stmt, "ssss" , $emailuser , $selector , $hashedToken , $expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        //Send this URL to EMail by Using Mail function :
        $path = "ur.txt";
        file_put_contents($path, $url . "THis is URL");

        header("location: ../reset-password.php?error=succeed&ul=$url");
        exit();

    }

    else {
        header("location: ../reset-password.php?error=emptyInput");
        exit();
    }
}
else {
    header("location: ../notfound.php");
    exit();
}