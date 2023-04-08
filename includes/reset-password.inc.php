<?php
//back end check and compare token and selector

if ($_GET["reset-pass-submit"]) {

    ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
        <img src ="https://thumbs.gfycat.com/GeneralUnpleasantApisdorsatalaboriosa-size_restricted.gif">
<?php

    $selector = $_GET["selector"];
    $validator = $_GET["validator"];
    $pwd = $_GET["pwd"];
    $pwdrep = $_GET["pwdrep"];
    //check if sel and val are empty
    if (empty($pwd) || empty($pwdrep)) {
        header("location: ../resetpass/create-new-password.inc.php?error=Emptyfeilds&selector=$selector&validator=$validator ");
        exit();
    }else if ($pwd != $pwdrep) {
        header("location: ../resetpass/create-new-password.inc.php?error=passwordNotmatched&selector=$selector&validator=$validator ");
        exit();
    }
    //checking if token has expried or not
    $currentDate = date("U");

    //Compare Selector and date
    require 'dbh.inc.php';

    $sql= "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpries >= ?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt , $sql)) {
        echo "The server Database is down please come later :)";
        exit();

    }else {
        mysqli_stmt_bind_param($stmt, "ss" , $selector , $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request .";
            exit();
        }
        else  {
            //matching the tokens : convert to binary (Hex -> Binary ) token from URL
            // ! : Token Inside DATABASE is Hashed (binray -> Hashed)
            // ! : Token Inside URL is converted from Binary -> Hex
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if ($tokenCheck === false ) {
                echo "You need to re-submit your reset request .";
                exit();
            }else if($tokenCheck === true) {
                //updating passsword
                $tokenEmail = $row["pwdResetEmail"];
                $sql ="SELECT * FROM users WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: notfound.php");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "s"  , $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        header("location: ../signin.php?error=You%20Dont%20Have%20Acounth");

                        exit();
                    }else {
                        //Succed Data !
                        $sql = "UPDATE users SET pass=? WHERE  email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Error";
                            exit();
                        }else {
                            $New_Hashed_Pass = password_Hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt,"ss" ,$New_Hashed_Pass , $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            echo "SUCCEEED";
                            //Delete token
                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "Error";
                                exit();
                            }else {
                                mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header('location: ../login.php?error=PasswordWasChangedSuccefly');
                            }
                            exit();
                        }
                    }
                }


            }
        }
    }



}else {
    header("location: ../notfound.php");
    exit();
}