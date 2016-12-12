<?php
include_once "cabecalho.php";
include_once "conecta.php";
include_once "banco-usuario.php";
include_once "logica-usuario.php";
include_once "banco-pessoas.php";

$userId = $_POST['userId'];
$senha = $_POST['senha'];
$usuario = buscaUsuario($conexao, $userId, $senha);

if($usuario == null){
	header("Location: index.php?login=0");
	die();
}else{
	logaUsuario($userId);

	if(!usuarioEstaLogado()){
		header("Location: index.php?falhaDeSeguranca=1");
		die();
	}else{

		$pessoas = buscaPessoas($conexao, $userId);
		
		foreach ($pessoas as $pessoa){ ?>

			<div class="col-md-offset-3 col-md-6">
				<div class="well">
					<h4 style="text-align: center;"> Clique para sortear seu amigo secreto </h4>
					<hr>
					<div class="col-md-offset-5">
						<form action = "altera-pessoa.php" method="post">
							<input type="hidden" name="userId" value="<?php echo $userId ?>">
							<input type="hidden" name="id" value="<?php echo $pessoa['id']?>">
							<input type="hidden" name="nome" value="<?php echo $pessoa['nome']?>">
							<input type="hidden" name="sorteado" value="<?php echo $pessoa['sorteado']?>">
							<button type="submit" class="btn btn-success btn-lg">Sortear</button>
						</form>
					</div>
				</div>
			</div>
<?php		
		}
	}
}
?>