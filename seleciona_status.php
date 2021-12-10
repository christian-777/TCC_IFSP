<?php
	session_start();
	include "conexao.php";
	
			$dados="";
			$id=$_SESSION["id_usuario"];
			$id2=$_POST["id"];
			$status=$_POST["status"];
			if($status==0){
				$select="SELECT  foto, nome_comprador, nome_vendedor, produtos.nome as nome_produto, preco_unitario, preco_final, itens_negociacao.quantidade as quantidade, descricao 
				FROM negociacao 
				inner join itens_negociacao on negociacao.id_negociacao=itens_negociacao.cod_negociacao 
				inner join produtos on itens_negociacao.cod_produto=produtos.id_produto 
				WHERE negociacao.cod_vendedor='$id' and negociacao.cod_comprador='$id2' and negociacao.status='0'";
				$res = mysqli_query($con, $select) or die(mysqli_error($con));
				while($linha=mysqli_fetch_assoc($res)){
					$dados.='<div name="status">
					<div class="container">
							<div class="row">
								<div class="col-md-3">
									<div class="card">
										<img src="fotos/'.$linha["foto"].'" class="card-img-top" alt="Imagem Item">
										<div class=" card-body">
											<!-- Nome Produto -->
											<h5 class = "card-title">'.$linha["nome_produto"].'</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<!-- Nome Produto -->
									<h6>'.$linha["nome_produto"].'</h6>
									<!-- Informação -->
									<p class="info_produto">'.$linha["descricao"].'</p>
									<p class="info_produto">Vendedor:'.$linha["nome_vendedor"].'</p>
									<p class="info_produto">Comprador:'.$linha["nome_comprador"].'</p>
									<p class="info_produto" style="color:red;">Compra em andamento, verifique o contato do vendedor em seu WhatsApp</p>
									<br/><br/>
								</div>
								<div class="col-md-5">
									<!-- Preço -->
									<p class = "preco_produto">Valor Total: R$ '.$linha["preco_final"].'</p>
									<p class="produto_vendedor">Preço (Un): R$ '.$linha["preco_unitario"].'</p>
									<label>Quantidade:</label>
									<input type="number" name="quantidade_negociacao"  readonly="readonly" class="produto_vendedor" value="'.$linha["quantidade"].'"/>
									<br /><br />
								</div>
							</div>
						</div>
					</div>';
				}
				echo $dados;
			}
			else{
				$select="SELECT  id_negociacao, foto, nome_comprador, nome_vendedor, produtos.nome as nome_produto, preco_unitario, preco_final, itens_negociacao.quantidade as quantidade, descricao 
				FROM negociacao 
				inner join itens_negociacao on negociacao.id_negociacao=itens_negociacao.cod_negociacao 
				inner join produtos on itens_negociacao.cod_produto=produtos.id_produto 
				WHERE negociacao.cod_vendedor='$id' and negociacao.cod_comprador='$id2' and negociacao.status='1'";
				$res = mysqli_query($con, $select) or die(mysqli_error($con));
				while($linha=mysqli_fetch_assoc($res)){
					$dados.='<div id="status'.$linha["id_negociacao"].'">
					<div class="container">
							<div class="row">
								<div class="col-md-3">
									<div class="card">
										<img src="fotos/'.$linha["foto"].'" class="card-img-top" alt="Imagem Item">
										<div class=" card-body">
											<!-- Nome Produto -->
											<h5 class = "card-title">'.$linha["nome_produto"].'</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<!-- Nome Produto -->
									<h6>'.$linha["nome_produto"].'</h6>
									<!-- Informação -->
									<p class="info_produto">'.$linha["descricao"].'</p>
									<p class="info_produto">Vendedor:'.$linha["nome_vendedor"].'</p>
									<p class="info_produto">Comprador:'.$linha["nome_comprador"].'</p>
									<p class="info_produto" style="color:red;">Compra Finalizada</p>
									<br/><br/>
								</div>
								<div class="col-md-5">
									<!-- Preço -->
									<p class = "preco_produto">Valor Total: R$ '.$linha["preco_final"].'</p>
									<p class="produto_vendedor">Preço (Un): R$ '.$linha["preco_unitario"].'</p>
									<label >Quantidade:</label>
									<input type="number" readonly="readonly" name="quantidade_negociacao"  class="produto_vendedor" value="'.$linha["quantidade"].'"/>
									<br /><br />
								</div>
							</div>
						</div>
					<br />';
				}
				echo $dados;
			}
?>