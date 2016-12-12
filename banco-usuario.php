<?php
	function buscaUsuario($conexao, $idUser, $senha){
		$query = "select * from usuario where idUser='{$idUser}' and senha='{$senha}' and inativo=0;";
		//echo $query;
		//exit();
		$resultado = mysqli_query($conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}

	function alteraUsuario($conexao, $idUser){
		$query = "UPDATE usuario SET inativo=1 where idUser='{$idUser}';";
		//echo $query;
		//exit();
		return mysqli_query($conexao, $query);
	}
?>