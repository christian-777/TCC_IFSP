<?php 
    //header("Content-Type: application/json");
    include "conexao.php";
		$id=$_POST["id"];
        $select="SELECT nome, preco, descricao FROM produtos WHERE id_produto='$id'";
		$res = mysqli_query($con, $select) or die(mysqli_error($con));
		while($linha=mysqli_fetch_assoc($res)){
			$resultado= $linha["nome"];
		}
	echo $resultado;
?>
