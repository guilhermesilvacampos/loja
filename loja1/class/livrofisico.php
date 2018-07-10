<?php

class LivroFisico extends Livro{
	
	public $taxaDeImpressoes;
	
	public function calculaPrecoDeVenda(){
		return $this->getPreco()  - $this->calculaImposto();
	}
}