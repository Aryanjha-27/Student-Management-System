<?php
include 'templates/header.php';
require_once 'config/db.php';
?>
<div class="container mt-5">
        <div class="container mt-5">
    <form action="function/register.php" method="POST">
        <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
    </div>


  <button type="submit" class="btn btn-primary">Sign Up</button>
  <p>Already Registered  <a href="index.php">Login</a></p>
</form>
</div>