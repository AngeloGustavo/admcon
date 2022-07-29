<?php include "comum/header.php";
error_reporting(0);

if($_SESSION['usuario']){
  header('Location: painel.php');
  exit();
}

if(isset($_SESSION['nao_autenticado'])){
?>
<div class="danger">Usuario ou senha invalidos!</div>
<?php 
};
unset($_SESSION['nao_autenticado']);
?>

<div id="login" class="login">
  <form action="login.php" method="POST">
    <h2>Login</h2>
      <div class="">
        <input required name="usuario" type="text" placeholder="Usuario" class="form-group">
      </div>  
      <div class="">
        <input required name="senha" type="password" placeholder="Senha" class="form-group">
      </div>             
      <div class="">
        <input required type="submit" value="Login" class="btn btn-primary py-66 px-4">
      </div>
      <a onclick="cadastro()" href="#">Cadastre-se</a>
    </form>
</div>  

<script> 
function cadastro(){
	document.getElementById('login').innerHTML="<div id='cadastro'><h2>Cadastro</h2><form onSubmit='return validate();' action='cadastro.php' method='post'><div class=''><label class='label'></label><input required name='nome' type='text' placeholder='Nome' class='form-group'></div><div class=''><label class='label'></label><input required name='usuario' type='text' placeholder='Usuario de Login' class='form-group'></div><div><input id='senha' required name='senha' type='password' placeholder='Senha' class='form-group'></div><div class='see'><p onclick='myFunction2()'>Ver senha</p></div><input required type='submit' value='Entrar' class='btn btn-primary py-66 px-4'></form><p>Ja tem uma conta? <a onclick='login()'' href='#'>Faça login</a></p></div>";
}
function login(){
	document.getElementById('cadastro').innerHTML="<form action='login.php' method='POST'><h2>Login</h2><div class=''><label for='' class='label'></label><input required name='usuario' type='text' placeholder='Usuario' class='form-group'></div><div class=''><label for='' class='label'></label><input required name='senha' type='password' placeholder='Senha' class='form-group'></div><div class=''><input required type='submit' value='Login' class='btn btn-primary py-66 px-4'></div><a onclick='cadastro()' href='#'>Cadastre-se</a></form>";
}
</script> 

<?php include "comum/footer.php"; ?>