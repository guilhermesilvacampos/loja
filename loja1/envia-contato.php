<?php
session_start();
$nome= $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username= "guilherme.silva.c55@gmail.com";
$mail->Password = "05032859";

$mail->setFrom("guilherme.silva.c55@gmail.com","Alura Curso PHP e MySQL");
$mail->addAddress("guilherme.silva.c@hotmail.com");
$mail->Subject = ("Email de contato da loja");
$mail->msgHTML("<html>de1: {$nome} </br> email: {$email} </br> Mensagem: {$mensagem} </html>");
$mail->AltBody = "de:{$nome} \n email: {$email} \n Mensagem: {$mensagem}";

if($mail->send()){
	$_SESSION["success"] = "Mensagem emviada com sucesso";
	header("Location: index.php");
}else{
	$_SESSION["danger"] = "Erro ao enviar a mensagem" . $mail->ErrorInfo;
	header("Location: contato.php");
}