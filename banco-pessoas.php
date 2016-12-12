<?php
	function buscaPessoas($conexao, $userId){
		$pessoas = array();
		$query = "select * from pessoa where sorteado=0 and pessoa.idUser <> '{$userId}' order by rand() limit 1";

		$resultado = mysqli_query($conexao, $query);

		while($pessoa = mysqli_fetch_assoc($resultado)){
			array_push($pessoas, $pessoa);
		}
		return $pessoas;
	}

	function alteraPessoa($conexao, $id){
		$query = "UPDATE pessoa SET sorteado=1 WHERE id='{$id}'";
		//echo $query;
		//exit();
		return mysqli_query($conexao, $query);
	}

?>