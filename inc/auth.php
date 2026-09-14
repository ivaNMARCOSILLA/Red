<?php session_start();
$ADMINS = ['RAUL MARCVOS','IVAN'];
if(isset($_POST['login_admin']) && in_array($_POST['login_admin'],$ADMINS)){
  $_SESSION['admin'] = $_POST['login_admin'];
}