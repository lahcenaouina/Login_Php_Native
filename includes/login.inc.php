<?php
if (isset($_POST["submit"])) {
    //variable inputs
    $input_e_u = $_POST["nore"];
    $pwd = $_POST["psw"];
    $stay_connect = $_POST["remember"];
    //import file
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (EmptyinputLogin($input_e_u ,$pwd ) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $input_e_u, $pwd);

}else {
    header("location: ../login.php");
    exit();
}