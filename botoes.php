
				<?php
					session_start();
					include "conexao.php";
			
					$dados="";
					$id=$_SESSION["id_usuario"];
					$id2=$_POST["id"];
					if($id2==0){
						
						$select="SELECT data_negociacao, usuarios.nome as nome_usuario, id_usuario, id_negociacao
								FROM negociacao 
								inner join usuarios on usuarios.id_usuario=negociacao.cod_comprador
								WHERE negociacao.cod_vendedor='$id' and negociacao.status='0'";
						$res = mysqli_query($con, $select) or die(mysqli_error($con));
						while($linha=mysqli_fetch_assoc($res)){
							$dados.='<div name="botao">
							<button onclick="aparece_negociacao('.$linha["id_usuario"].', 0)" class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample'.$linha["id_usuario"].'" aria-expanded="false" aria-controls="collapseExample"> Negociação com: '.$linha["nome_usuario"].'<br /> Data: '.$linha["data_negociacao"].'</button>
									<br />
									<div class="collapse" id="collapseExample'.$linha["id_usuario"].'">
									<br/>
									<div class="card card-body">
										<button onclick="finaliza('.$linha["id_negociacao"].')" class="btn btn-danger"> Finalizar compra</button>
									</div>
									</div>
							</div>';
									
						}
						echo $dados;
					}
					else{
						$select="SELECT data_negociacao, usuarios.nome as nome_usuario, id_usuario , id_negociacao
								FROM negociacao 
								inner join usuarios on usuarios.id_usuario=negociacao.cod_comprador
								WHERE negociacao.cod_vendedor='$id' and negociacao.status='1'";
						$res = mysqli_query($con, $select) or die(mysqli_error($con));
						while($linha=mysqli_fetch_assoc($res)){
							$dados.='<div id="botao'.$linha["id_negociacao"].'">
							<button onclick="aparece_negociacao('.$linha["id_usuario"].', 1)" class="btn btn-dark"> Negociação com: '.$linha["nome_usuario"].' <br /> Data: '.$linha["data_negociacao"].'</button>';
						}
						echo $dados;
					}
				?>
		


