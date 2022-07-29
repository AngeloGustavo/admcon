<?php 
	include "comum/header.php";
	session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('Location: index.php');
	exit();
}
$usuario=mysqli_real_escape_string($conect,$_POST['usuario']);
$senha=mysqli_real_escape_string($conect,$_POST['senha']);
$query="SELECT * FROM usuario WHERE usuario = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conect,$query);
$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['usuario']=$usuario;
	$_SESSION['id']=$id;
	header('Location: painel.php');
	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();

}

mysqli_close($conect);
?>