<?php require_once("cabecalho.php");

require_once("logica-usuario.php");


verificaUsuario();


$categoria = new Categoria;
$categoria->id = $_POST['categoria_id'];

if(array_key_exists('usado',$_POST)){
	$usado = "true";
}else{
	$usado = "false";
}




$aceita = array('LivroFisico','Ebook');
if(in_array($_POST['tipoProduto'],$aceita)){
	$produto = new $_POST['tipoProduto']($_POST ['nome'],$_POST['preco'],$_POST['descricao'],$categoria,$usado);
	$produto->isbn = $_POST['isbn'];
	
}





$produtoDAO = new ProdutoDAO($conexao);

?>




<?php if($produtoDAO->insereProduto($produto)){ ?>
	<p class = "text-success"> Produto <?= $produto->nome ?>, <?= $produto->getPreco() ?> inserido com sucesso! </p>
<?php } else {

$msg = mysqli_error($conexao);

 ?>

	<p class = "text-danger"> O Produto <?= $produto->nome ?> não foi adiicionado <?= $msg ?> < </p>
<?php
}



mysqli_close($conexao);



 ?>


<?php include("rodape.php"); ?>