<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrep = $_POST["pwdrep"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSingup($name ,$username, $email , $pwd , $pwdrep) !== false) {
        header("location: ../signin.php?error=emptyinput");
        exit();
    }
    if (UnvalidUid($username) !== false) {
        header("location: ../signin.php?error=Unvaliduid");
        exit();
    }
    if (UnvalidEmail($email) !== false) {
        header("location: ../signin.php?error=UnvalidEmail");
        exit();
    }
    if ( pwdMatch($pwd , $pwdrep) !== false) {
        header("location: ../signin.php?error=PasswordNotMatched");
        exit();
    }

    if (EUexist( $conn ,$username , $email) !== false) {
        header("location: ../signin.php?error=alreadyTaken");
        exit();
    }

    // IF ALL GOOD THEN :
    createUser($conn,$name , $username , $email ,$pwd);

}else{
    header("location: ../signin.php");
    exit();
}