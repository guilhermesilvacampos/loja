<?php require_once("cabecalho.php");
require_once("logica-usuario.php");
?>











<?php if(usuarioEstaLogado()){ ?>
<p class="text-success">Você está logado como <?= usuarioLogado() ?> 
<a href="logout.php">Deslogar</a></p>

<?php }if(!usuarioEstaLogado()) {?>




			<h1>Bem Vindo!</h1>
			
			<h2>Login</h2>
			<form action="login.php" method="post">
			<table class="table">
			<tr>
			<td>Email</td>
			<td><input type="email" name="email" class="form-control"</td>
			</tr>
			<tr>
			<td>Senha</td>
			<td><input type="password" name="senha" class="form-control"></input></td>
			
			</tr>
			<tr>
			<td><button class="btn btn-primary">Login</button></td>
			</tr>
			
			</table>
			</form>
			
			<?php }?>
			
			
			
	<?php include("rodape.php")?>
	
	
	