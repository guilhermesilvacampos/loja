<?php


session_start();

function verificaUsuario(){
if(!usuarioEstaLogado()){
	$_SESSION["danger"] = "Você Não Tem Permissão para acessar esta página, se loga ai seu Bagabundu!";
	
	header("Location: index.php");
	die();
}	
}


function usuarioEstaLogado(){
	if(isset($_SESSION["usuario_logado"])){
		return true;
	}else{
		return false;
	}
	
}

function usuarioLogado(){
	return $_SESSION["usuario_logado"];
}


function logaUsuario($email){
	$_SESSION["usuario_logado"] = $email;
}

function logout(){
	session_destroy();
	session_start();
}