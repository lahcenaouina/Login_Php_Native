<?php
require '../header.php';
?>


<?php
// reseve token from "reset-request.inc.php" and add new password and Send it to "reset-password.inc.php"

$selector = &$_GET["selector"];
$validator = &$_GET["validator"];
if (empty($selector) || empty($validator)) {
    echo 'Could not validate your request';
}else {
    if (ctype_xdigit($selector) === true & ctype_xdigit($validator) === true) {
        ?>
<div class="container">
       <form  method="GET" action="../includes/reset-password.inc.php">
           <input type="hidden" name="selector" value="<?php echo $selector; ?>">
           <input type="hidden" name="validator" value="<?php echo $validator; ?>">
           <input type="password" placeholder="Entre new password" name="pwd" >
           <input type="password" placeholder="repeat new password" name="pwdrep">
           <input type="submit" value="Reset password" name="reset-pass-submit">
           <?php
           if (isset($_GET["error"])){
               echo '
                <div class="alert alert-danger tet" role="alert">
                    '.$_GET["error"].'
                </div>
            ';
           }
           ?>
      </form>
    </div>
<?php
    }
}
?>








<?php
require '../footer.php';
?>

