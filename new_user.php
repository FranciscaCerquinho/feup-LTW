<?php
include_once('includes/session_start.php');
include_once('database/user.php');
include_once('database/connection.php');

// Ler dados vindos do post
$name         = $_POST['name'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$age          = $_POST['age'];
$email        = $_POST['email'];
$photo        = $_FILES['photo'];

if ( !preg_match ("/^[a-zA-Z\s]+$/", $name) && !preg_match ("/^[a-zA-Z\s]+$/", $username) ) {
  $_SESSION['error_messages']= 'Error: Name and Username can only contain spaces or letters';
}
else{
  try{
    insert_new_user($name, $username,$password, $age, $email,$photo);
  }
  catch(Exception $e){
    $_SESSION['error_messages']="Username already exists";
  }
}
header('Location: index.php');

  ob_end_flush();
?>
