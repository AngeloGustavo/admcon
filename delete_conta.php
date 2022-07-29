<?php 
include "comum/header.php";
session_start();
$pid=$_GET['pid'];

if(isset($_GET['cid'])){
	$cid = (int)$_GET['cid'];
	$query = "DELETE FROM entrasaida WHERE codigo =" . $cid;
}else{
	echo 'ID nao setado.';
}
$result = mysqli_query($conect,$query);

if($result){
	$_SESSION['success_message'] = 'Conta deletada com sucesso!';
	header("Location: entrasaida.php?pid={$pid}");
}else{
	$_SESSION['error_message'] = 'Conta nao deletada.';
}	
?>