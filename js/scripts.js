$(document).ready(function(){
	function cadastrar(){
		var dados= { nome: $("#nome").val(),
					 email: $("#email").val(),
                     senha: $("#senha").val()};
		$.post("cadastrar.php", dados, function(d){
			alert("Usuario cadastrado com sucesso!!!");
		});
	}
	
	$("#logar").click(function(){
		var dados= {email: $("#email_login").val(),
                     senha: $("#senha_login").val()};
					 
		$.post("autenticar.php", dados, function(d){
			if(d!=1){
				$("#mensagem").html("Usuario ou senha incorreto!!");
			}
			else{
				window.location.href="home.php";
			}
		});
	});
	
	function confirmar_senha(){
		var senha = $("#senha").val(), confirma_senha = $("#confirma_senha").val();
		
		if(senha!=confirma_senha){
			$("#mensagem").html("As senhas estão diferentes, confirme a senha!!");
			cadastrar();
		}
		else{
			$("#mensagem").html("");
		}
	}
	
	
	$("#cadastrar").click(function(){
		confirmar_senha();
		console.log("teste");
		$("#canselar_modal").click();
	});
	


	
});