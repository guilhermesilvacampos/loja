<tr> 
			<td> Nome:</td>
			<td> <input class ="form-control" type="text" name = "nome" value="<?=$produto['nome']?>">  </td>
		</tr>
	
		<tr>
			<td> Preco: </td>
			<td> <input class= "form-control" type="number" name = "preco" value="<?=$produto['preco']?>"></td> 
		</tr>
		
		<tr>
		<td> Descrição </td>
		<td><textarea name="descricao" class="form-control"><?=$produto['descricao']?></textarea> </td>
		</tr>
		
		<tr>
		<td></td>
		<td><input type="checkbox" name="usado"  <?=$usado?> value="true">Usado</input></td>
		</tr>
		
		<tr>
		<td>Categoria</td>
		<td>
		<select name="categoria_id" class = "form-control">
		<?php 
		
		foreach($categorias as $categoria){
		if($produto['categoria_id']== $categoria['id']){
			$essaCategoria = "selected";
		}else{
			
			$essaCategoria = "";
		}
		
		 ?>
		<option type="radio" name="categoria_id" value="<?=$categoria['id']?>" <?=$essaCategoria?> > <?=$categoria['nome']?> </option></br>
		
		<?php
		
		}
		 ?>
		</select>
		</td>
		</tr>
		<tr>
		<td>Tipo do Produto</td>
		<td>
		<select name= "tipoProduto" class="form-control"> 
		<optgroup label="Livros">
		 <option value="livroFisico">Livro Fisico</option>
		 <option value="Ebook">Livro Ebook</option>
		 </optgroup>
		</select>
		</td>
		</tr>
		<tr>
		<td>ISBN(caso seja um livro)</td>
		<td><input type="text" name="isbn" class = "form-control"></input></td>
		</tr>