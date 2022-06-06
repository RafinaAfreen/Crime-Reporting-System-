<?php 

session_start();
session_destroy();

header("Location: com_login.php");

?>