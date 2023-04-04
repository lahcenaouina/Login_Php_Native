<?php
require "header.php";

if (isset($_SESSION["username"])) {
    header("location: notfound.php");
}else {
?>
    <form  method="GET" action="includes/reset-password.inc.php">
        <div class="imgcontainer">
            <img src="https://img.freepik.com/vecteurs-libre/homme-affaires-caractere-avatar-isole_24877-60111.jpg?w=740&t=st=1680349643~exp=1680350243~hmac=19029949e5f2d1107a94d08011fb98a5a3d756822094a0d8bedd089bdc1d6093" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Insert your email </b></label>
            <input type="text" placeholder="Enter email..." name="email" >


            <!--Error Messages-->
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] !== "succeed")
                    echo '
                    <div class="alert alert-danger tet" role="alert">
                        <p>Insert your password</p>
                    </div>
                    ';

                if ($_GET["error"] == "succeed")
                    echo '
                    <div class="alert alert-info " >
                        <p>The password was sended to ur email</p>
                    </div>
                    ';
            }



            ?>
            <button class="submit-reset-pass" type="submit" style="background: #092532" name="submit">Reset your password</button>
        </div>

    </form>


<?php
}
include_once "footer.php";
?>