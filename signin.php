
<?php
include_once("header.php");
?>
<h1 style="text-align: center">SIGN IN  SPACE</h1>
<form  method="post" action="includes/signin.inc.php">
<style>
    .input1,.input2,.input3,.input4,.input5{
        border-radius:10px;
    }

</style>
    <div class="imgcontainer">
        <img  src="https://cdn4.iconfinder.com/data/icons/forum-buttons-and-community-signs-1/794/profile-3-512.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname" ><b>name</b></label>
        <input type="text" placeholder="Enter name" name="name" class="input1">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" class="input2" >

        <label class="tet" ><b>email</b></label>
        <input type="text" placeholder="Enter email" name="email" class="input3">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" class="input4">

        <label for="psw"><b>Repeat Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwdrep" class="input5" >

        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] !== "succeed"){
                echo '
                <div class="alert alert-danger tet" role="alert">
                    '.$_GET["error"].'
                </div>
            ';
            }
            elseif (($_GET["error"] === "succeed")){
                echo '
                <div class="alert alert-success" role="alert">
                    '.$_GET["error"].'
                </div>
            ';
            }
        }


        ?>


        <button type="submit" name="submit">Sign up</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>

<?php
include_once "footer.php";
?>
