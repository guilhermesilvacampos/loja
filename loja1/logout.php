<?php require_once("logica-usuario.php");


logout();
$_SESSION["danger"] = "Usuario Deslogado com sucesso!";

header("Location:index.php");
die();