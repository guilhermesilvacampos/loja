<?php require_once("cabecalho.php");
require_once("conecta.php");



$id = $_GET['id'];

$produtoDAO = new ProdutoDAO($conexao);
$produto = $produtoDAO->buscaProduto($id);

$categoriaDAO = new CategoriaDAO($conexao);
$categorias= $categoriaDAO->listaCategorias();


if($produto['usado']=="1"){
	$usado= "checked";
}if($produto['usado']=="0"){
	$usado = " ";
}

?>


		<h1>Alterando Produto </h1>
		
		
<form action = "altera-produto.php" method="post">
<input type= "hidden" name= "id" value = "<?=$produto['id']?>"</input>
	<table class="table">
		<?php include("produto-formulario-base.php");?>
		
		<tr>
		<td><button class="btn btn-primary" type="submit">Alterar</button> </td>
		</tr>

	

</table>
	
</form>

<?php include("rodape.php")?>