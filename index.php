<?php
include_once('database/connection.php');
include_once('database/category.php');

include_once('templates/common/header.php');
include_once('templates/common/footer.php');

if($_SERVER['REQUEST_URI'] != '/register.php')
  include_once('templates/session/user.php');
?>
