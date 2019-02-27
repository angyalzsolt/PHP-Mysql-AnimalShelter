<?php
ob_start();
session_start();
require_once("dbh.inc.php");


if (!isset($_SESSION['user'])) {
 header("Location: ../login.php");
} else if(isset($_SESSION['user'])!="") {
 header("Location: ../admin_landing_page.php");
}

if (isset($_GET['logout'])) {
 unset($_SESSION['user']);
 unset($_SESSION['urole']);
 session_unset();
 session_destroy();
 header("Location: ../login.php");
 exit;
}
?>