<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/Style_main.css">
    <link rel="stylesheet" href="css/profile.css"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light barhead ">
    <a class="navbar-brand" href="./">Sellthing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-end " id="navbarTogglerDemo02">

        <ul class="navbar-nav justify-content-around">
            <li class="nav-item active ">
                <a class="nav-link mr-3 " href="">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link mr-3" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-3" href="#">News</a>
            </li>
            <!-- Login buttons-->
            <?php
            if (isset($_SESSION["username"])) {
                echo '<div class="d-flex justify-content-around mr-3">
                <li class="nav-item">
                    <a class="btn btn-info mr-3" href="Profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-secondary mr-3" href="includes/logout.inc.php">Log Out</a>
                </li>
            </div>';
            }else {
            echo '
            <div class="d-flex justify-content-around mr-3">
                <li class="nav-item">
                    <a class="btn btn-info mr-3" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-secondary mr-3" href="signin.php">Sign In</a>
                </li>
            </div>';

            }

            ?>

        </ul>
    </div>
</nav>
</body>