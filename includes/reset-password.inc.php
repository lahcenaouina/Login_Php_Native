<?php
require_once "functions.inc.php";


if (isset($_GET["submit"])) {


    if (emptyinsert($_GET["email"]) == false) {
        $bytes = random_bytes(5);
        var_dump(bin2hex($bytes));

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