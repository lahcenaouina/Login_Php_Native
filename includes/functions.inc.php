<?php

function emptyInputSingup($name, $username, $email, $pwd, $pwdrep)
{
    $result=null ;
    if (empty($name) || empty($username) || empty($email) || empty($pwd) || empty($pwdrep)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}

function UnvalidUid($username)
{
    $result=null ;
    if (!preg_match("/^[a-zA-Z0-9]*$/" , $username)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}
function UnvalidEmail($email)
{
    return !(bool)filter_var($email , FILTER_VALIDATE_EMAIL);
}


function pwdMatch($pwd, $pwdrep)
{
$result=null;
    if ($pwd !== $pwdrep) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function  EUexist($conn , $username ,$email) //this function Work for LOGIN and SIGN UP
{
    $sql = "Select * from users Where username like ? OR email like ?;";
    $stmt = mysqli_stmt_init($conn);

    //checking for any error
    // There is error = > true
    // no eroor => false
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location : ../signin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);
    ////Fetch a result row as an associative array and check
    if ($row = mysqli_fetch_assoc($result_data)) {
      // username or email kayn in db (send an error message for sign)
        return $row;

    } else {
        //username/ email is still available (for sin up )

        return false;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $pwd){

    $sql = "INSERT INTO users (name, username, email,pass) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location : ../signin.php?error=stmtfailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name , $email, $username ,$hashedpwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signin.php?error=succeed");
    exit();
}
