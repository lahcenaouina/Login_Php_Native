<?php
session_start();
session_unset();
session_destroy();
?>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body class="main">
<img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921" >
</body>

<?php
header("refresh: 1; url = ../index.php");
