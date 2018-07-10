<?php




require_once("class/UsuarioDAO.php");
require_once("logica-usuario.php");

$usuarioDAO = new UsuarioDAO($conexao);

$usuario = $usuarioDAO->buscaUsuario($_POST["email"],$_POST["senha"]);



if($usuario == null){

	$_SESSION["danger"] = "Usuario ou senha inválida";
	
	header("Location: index.php");
}else{
logaUsuario($usuario["email"]);
	$_SESSION["success"] = "Usuário logado com sucesso!";
	
	header("Location: index.php");
}
die();