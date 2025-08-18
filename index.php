<?php 
session_start();
// print_r($_SESSION);
include('function/helper.php');
if(!is_logged_in()){
    header("location:login.php");
    exit();
}
if(is_user()){
  render_default_template('student/dashboard.php');
    exit();

}elseif(is_admin()){
    render_default_template('admin/dashboard.php');
    exit();
}
// print_r(is_admin());