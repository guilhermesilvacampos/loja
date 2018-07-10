<?php require_once("cabecalho.php"); 
include("conecta.php");



$id = $_POST['id'];
$nome = $_POST ['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado',$_POST)){
	$usado = "1";
}else{
	$usado = "0";
}

$produtoDAO = new ProdutoDAO($conexao);

?>



<?php if($produtoDAO->alteraProduto($id,$nome, $preco, $descricao,$categoria_id,$usado)){ ?>
	<p class = "text-success"> Produto <?= $produto->nome ?> alterado com sucesso! </p>
<?php } else {

$msg = mysqli_error($conexao);

 ?>

	<p class = "text-danger"> O Produto <?= $produto->nome ?> não foi alterado <?= $msg ?> < </p>
<?php
}



mysqli_close($conexao);



 ?>


<?php include("rodape.php"); ?>