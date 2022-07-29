<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<?php 
  $conect=mysqli_connect('127.0.0.1','admin','12345678','admcon');
  session_start();
?>

<div class="topnav" id="myTopnav">
  <a class="" href="painel.php">ADMCON</a>
  <?php 
  error_reporting(0);
  if($_SESSION['usuario'] != null ){; ?>
 	<a href="logout.php">Sair</a>
  <?php } ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
