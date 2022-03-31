<?php session_start();
unset($_SESSION['username']);
header('location:../../login/login-form.php');