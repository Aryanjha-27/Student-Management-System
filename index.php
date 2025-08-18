<?php 
session_start();
// print_r($_SESSION);
include('function/helper.php');
if(!is_logged_in()){
    header("location:login.php");
    exit();
}
if(is_user()){
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    if(file_exists("student/{$page}.php")){
        render_default_template("student/{$page}.php");
        exit();
    } 

}elseif(is_admin()){
     $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    if(file_exists("admin/{$page}.php")){
        render_default_template("admin/{$page}.php");
        exit();
    } 
}
// print_r(is_admin());