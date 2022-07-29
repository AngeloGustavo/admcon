<?php 
include "comum/header.php";
session_start();

if(isset($_GET['pid'])){

	// retrieve id from url
	$pid = (int)$_GET['pid'];

	// sql delete query
	$query = "DELETE FROM perfil WHERE idperfil =" . $pid;
}else{
	echo 'ID nao setado.';
}

//query execution
$result = mysqli_query($conect,$query);

//display message to user 
if($result){
	$_SESSION['success_message'] = 'Perfil deletado com sucesso!';
	header('Location: painel.php');
}else{
	$_SESSION['error_message'] = 'Perfil nao deletado.';
	header('Location: painel.php');
}	
?>