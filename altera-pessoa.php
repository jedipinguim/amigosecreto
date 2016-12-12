<?php
include_once "cabecalho.php";
include_once "conecta.php";
include_once "logica-usuario.php";
include_once "banco-pessoas.php";
include_once "banco-usuario.php";

if(!usuarioEstaLogado()){
		header("Location: index.php?falhaDeSeguranca=1");
		die();
}else{


$id = $_POST['id'];
$nome = $_POST['nome'];
$sorteado = $_POST['sorteado'];
$userId = $_POST['userId'];


	alteraUsuario($conexao, $userId);
	alteraPessoa($conexao, $id);
?>
	<div class="col-md-offset-3 col-md-6">
		<div style="text-align: center;" class="alert alert-success" role="alert">
			<p> Seu amigo secreto é ... </p>
			<br>
			<p> <strong style="font-size: 20px;"> <?php echo $nome; ?> </strong> !!! </p>
			<br>
			<p>Compre um presente bem bacana pra ele!</p>
		</div>
	</div>

<?php
}
	session_destroy();
	include_once "rodape.php";
?>