
	function cadastrar_produto(){
		var dados= { usuario_adm:$("#usuario_adm").val(),
					 nome_produto: $("#nome_produto").val(),
					 descricao: $("#descricao").val(),
                     preco: $("#preco").val(),
					 foto: $("#foto").val(),
					 tipo_produto: $("#tipo_produto").val(),
					 quantidade: $("#quantidade").val()};
					 console.log(dados);
		$.post("cadastrar_produto.php", dados, function(d){
			
			$("#limpar").click();
		});
	}
	
	
	$("#cadastrar_produto").click(function(){
		if($("#nome_produto").val()=="" || $("#descricao").val()=="" || $("#preco").val()=="" || $("#tipo_produto").val()==""){
			$("#msg").html("Todos os campos (Nome, descrição, preço, tipo de produto e foto) devem der preenchidos devidamente, veja se estao devidamente preenchidos!!");
		}
		else{
			
			//$("#limpar").click();
		}
	});