<?php
session_start();
session_unset();
session_destroy();
echo "LOGING OUT ...";
header("refresh: 1; url = ../index.php");
