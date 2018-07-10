<?php require_once("cabecalho.php");
 require_once("class/Produto.php");

require_once("logica-usuario.php");
require_once("conecta.php");

verificaUsuario();

?>



<table class = " table table-striped table-bordered">
<tr>
<td><h3>Nome</h3></td>
<td><h3>Preço</h3></td>
<td><h3>Desconto</h3></td>
<td><h3>Preço de Venda</h3></td>
<td><h3>Descrição</h3></td>
<td><h3>Categoria</h3></td>
<td><h3>ISBN</h3></td>
<td><h3>Usado</h3></td>
<td><h3>Alterar</h3></td>
<td><h3>Excluir</h3></td>
</tr>
<?php
$produtoDAO = new ProdutoDAO($conexao);

$produtos = $produtoDAO->listaProdutos();
echo "produto lista:" . $produto . " fim";

foreach($produtos as $produto){

if($produto->usado=="1"){
	$usado= "USADO";
}if($produto->usado!="1"){
	$usado = "NOVO";
}

?>
<tr>
<td><?=$produto->nome?></td>
<td><?=$produto->getPreco()?></td>
<td><?=$produto->calculaImposto()?></td>
<td><?=$produto->calculaPrecoDeVenda()?></td>
<td><?= substr($produto->descricao,0,15)?></td>
<td><?=$produto->categoria->nome?></td>
<td>
<?php 

 if($produto->temIsbn()){
 echo $produto->isbn;
}?>

</td>
<td><?=$usado?></td>
<td>
<a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->id?>">Alterar</a>
</td>
<td> 
<form action="remove-produto.php" method="post" >
<input type="hidden" name="id" value="<?=$produto->id?>" ></input>
<button  class="btn btn-danger" >Remover</button>
</form>
 </td>

</tr>
	
	
<?php
}
?>

</table>


<?php include ("rodape.php");?>