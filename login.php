<?php
session_start();
// session_destroy();
// print_r($_SESSION);
include('function/helper.php');
if (is_logged_in()) {
    header("location:index.php");
    exit();
}
include('./templates/head.php');
?>
<div class="login-page">
<?php
include('./templates/login.php');
?>
</div>