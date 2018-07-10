<?php 
abstract class Produto {
	public $id;
	public $nome;
	private $preco;
	public $descricao;
	public $categoria;
	public $usado;
	
	
	function __construct($nome = "Indefinido",$preco=9999,$descricao="Indefinida",Categoria $categoria,$usado="usado"){
		$this->nome = $nome;
		$this->setPreco($preco);
		$this->descricao= $descricao;
		$this->categoria = $categoria;
		$this->usado = $usado;
	}
	
	public function temIsbn(){
		return $this instanceof Livro;
	}
	
	public function calculaImposto(){
	
		return $this->getPreco() * 0.195;
		
	}
	
	public abstract function calculaPrecoDeVenda();
	
	public function valorComDesconto($valor = 0.1 ){
	if($valor<= 0.5 && $valor>0){
		$this->setPreco($this->preco - $this->preco * $valor);
		}
		return $this->preco;
	}
	
	public function setPreco($preco){
		if($preco > 0){
			$this -> preco = $preco;
		}
	}
	
	public function getPreco(){
		return $this ->preco;
	}
	
	function __toString(){
		return $this->nome ." , " . $this->preco;
	}
	
	
}


?>