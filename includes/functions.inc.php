<?php

function emptyInputSingup($name, $username, $email, $pwd, $pwdrep)
{

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
        //username not in database / email username is still available (for sin up )

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

    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name , $email, $username ,$hashed_password);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signin.php?error=succeed");
    exit();
}
function EmptyinputLogin($input_e_u ,$pwd ){
    if (empty($input_e_u) || empty($pwd)) {
        return true;
    }
    return false;

}

function loginUser($conn, $input_e_u, $pwd)
{

    //check the Username oR email exists
    $NoreExist = EUexist($conn, $input_e_u, $input_e_u);

    if ($NoreExist === false) {
        header("location: ../login.php?error=NotAlredyExists");
        exit();
    }

    //Check Hashed password
    $pwdHashed = $NoreExist["pass"];

    $checked_pass = password_verify($pwd , $pwdHashed); //match TRUE / not matched false

    if ($checked_pass === true) {
//    if (var_dump($checked_pass) == true) {
        session_start();
        $_SESSION["username"] = $NoreExist["username"];
        $_SESSION["email"] = $NoreExist["email"];
        $_SESSION["password"] = $NoreExist["pass"];
        $_SESSION["name"] = $NoreExist["name"];
        header("location: ../Profile.php");
        exit();
    } else if ($checked_pass === false){
        header("location: ../login.php?error=WrongPassword ");
        exit();
    }



};
function emptyinsert($var)
{
    if (empty($var)){
        return true;
    }
    return false;
}