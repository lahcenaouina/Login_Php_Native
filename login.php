<?php
include_once "header.php";
?>
<h1 style="text-align: center">LOGIN SPACE</h1>
<form  method="POST" action="includes/login.inc.php">
    <div class="imgcontainer">
        <img src="https://img.freepik.com/vecteurs-libre/homme-affaires-caractere-avatar-isole_24877-60111.jpg?w=740&t=st=1680349643~exp=1680350243~hmac=19029949e5f2d1107a94d08011fb98a5a3d756822094a0d8bedd089bdc1d6093" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username or Email</b></label>
        <input type="text" placeholder="Enter Username or email..." name="nore" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" >

        <!--Error Messages-->
        <?php
        if (isset($_GET["error"])){

                echo '
                <div class="alert alert-danger tet" role="alert">
                    '.$_GET["error"].'
                </div>
            ';
        }


        ?>
        <button type="submit" name="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="reset-password.php">password?</a></span>
    </div>
</form>
<?php
include_once "footer.php";
?>