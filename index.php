<?php
	include_once "cabecalho.php";
	include_once "conecta.php";
	include_once "logica-usuario.php";
?>
	<div class="col-md-offset-4 col-md-4">
		<div class="panel panel-default">
		 	<div class="panel-heading">Acesse com Login e Senha</div>
		  	<div class="panel-body">
	<?php
		  		if(isset($_GET['login']) && $_GET['login']==false){ ?>
					<p class="bg-danger text-danger">Usuário ou senha inválida</p>
			<?php	
				}

				if(isset($_GET['login']) && $_GET['login']==true){ ?>
					<p class="bg-success text-success">Logado com sucesso</p>
			<?php
				}

				if(isset($_GET['falhaDeSeguranca']) && $_GET['falhaDeSeguranca']==true){ ?>
					<p class="bg-danger text-danger">Você não tem acesso a essa funcionalidade</p>
			<?php
				}

				if(usuarioEstaLogado()){ ?>
					<p class="text-success">Você está logado como <?php echo usuarioLogado();?></p>
			<?php
				}else{
			?>

				<form action="login.php" method="post">
					<div class="form-group">
						<label>Número de usuário</label>
						<input type="text" class="form-control" name="userId">
					</div>
					<div class="form-group">
						<label>Senha</label>
						<input type="password" class="form-control" name="senha">
					</div>

					<button type="submit" class="btn btn-success" style="font-size: 16px;">Entrar</button>
				</form>
		 	</div>
		</div>
	</div>

<?php
}
	include_once "rodape.php";
?>
