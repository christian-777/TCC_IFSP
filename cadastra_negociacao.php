<?php
	session_start();
    include "conexao.php";
    $id=$_POST["id"];
	$resultado=[];
	$id_comprador= $_SESSION["id_usuario"];
	
	$select1="SELECT  nome FROM usuarios WHERE id_usuario='$id_comprador'";
		$res1 = mysqli_query($con, $select1) or die(mysqli_error($con));
		while($linha1=mysqli_fetch_assoc($res1)){
			$resultado1= $linha1["nome"];
		}
		
	$select="SELECT  nome_vendedor, preco, vendedores.cod_vendedor as cod_vendedores FROM vendedores inner join produtos on produtos.cod_vendedor=vendedores.cod_vendedor WHERE id_produto='$id'";
		$res = mysqli_query($con, $select) or die(mysqli_error($con));
		while($linha=mysqli_fetch_assoc($res)){
			$resultado["cod_vendedor"]= $linha["cod_vendedores"];
			$resultado["preco"]= $linha["preco"];
			$resultado["nome_vendedor"]= $linha["nome_vendedor"];
		}
	
	
	date_default_timezone_set('America/Sao_Paulo');
	$hora=date("H");
	$hora-=1;
	$data=@date("l, d  F  Y, ".$hora.":i:s");
	
    $insert= "INSERT INTO negociacao(
									nome_comprador,
									nome_vendedor,
                                    cod_comprador,
                                    cod_vendedor, 
									data_negociacao,
									status
                                ) VALUES (
                                    ?,
                                    ?,
									?,
									?,
									?,
									?
                                )";

	if($stmt = mysqli_prepare($con, $insert)) { 
		$id_v=$resultado["cod_vendedor"];
		$nome_v=$resultado["nome_vendedor"];
		echo $id_v;
		$zero=0;
		mysqli_stmt_bind_param($stmt, "ssssss", $resultado1, $nome_v, $id_comprador, $id_v, $data, $zero);
		

		mysqli_stmt_execute($stmt);
	  
		mysqli_stmt_close($stmt);
	}
	
	$_SESSION["insert_id"]=mysqli_insert_id($con);
	mysqli_close($con);
?>