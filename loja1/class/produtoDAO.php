<?php
require_once("Produto.php");
class ProdutoDAO{

private $conexao;

function __construct($conexao){
	$this->conexao = $conexao;
}

function insereProduto(Produto $produto){
$produto->nome = mysqli_real_escape_string($this->conexao,$produto->nome);
$produto->descricao = mysqli_real_escape_string($this->conexao,$produto->descricao);

if($produto->temIsbn()){
	$isbn = $produto->isbn;
}else{
	$isbn= null;
}
$tipoProduto = get_class($produto);
$query = "insert into produtos (nome,preco,descricao,categoria_id,usado,isbn,tipoProdutos) values ('{$produto->nome}',{$produto->getPreco()},'{$produto->descricao}', '{$produto->categoria->id}', {$produto->usado}, '{$isbn}','{$tipoProduto}')";
echo $query;
return mysqli_query($this->conexao,$query);	
}


function listaProdutos(){
	$array = array();
	$resultado = mysqli_query($this->conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id");
	
while($produto_atual = mysqli_fetch_assoc($resultado)){
	
	$categoria = new Categoria();
	$categoria->nome = $produto_atual['categoria_nome'];
	
	
		$produto = new $produto_atual['tipoProdutos']($produto_atual['nome'],$produto_atual['preco'],$produto_atual['descricao'],$categoria,$produto_atual['usado']);
		$produto->isbn = $produto_atual['isbn'];
	
		$produto->id = $produto_atual['id'];
	
	
	
	
	array_push($array,$produto);
}
return $array;
	
}


function removeProduto($id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($this->conexao,$query);
}

function buscaProduto($id){
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($this->conexao,$query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($id,$nome, $preco,$descricao,$categoria_id,$usado){
$query = "update produtos set nome = '{$nome}', preco = '{$preco}' , descricao= '{$descricao}' ,categoria_id = '{$categoria_id}' ,usado='{$usado}' where id = '{$id}'";
return mysqli_query($this->conexao,$query);	
}

}