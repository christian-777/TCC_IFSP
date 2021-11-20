<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login | </title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/login.css">
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!--Fonte Awersome-->
        <script src="https://kit.fontawesome.com/827d4800d4.js" crossorigin="anonymous"></script>
        <!-- Progress Bar-->
        <script src="js/progressbar.min.js"></script>
        <!--Paralax -->
        <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">  
    </head>
    <body>
        <main>
            <div id="login_area">
                <div class="container">
                    <h2>Login</h2>
					<?php
						if(isset($_GET["id"])){
							echo "<div class='text-danger'>Login nao existe</div>";
						}
					?>
                    <div class="underline">
                        
                    </div>
                    <form action="autenticar.php" method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"><i class="fas fa-envelope"></i></label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="senha" class="col-sm-2 col-form-label"><i class="fas fa-lock"></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <input type="submit" value="Entrar" class = "main-btn">
                        <br /><br />
                        <a href="cadastro.html">Não possui uma conta? Clique Aqui</a>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div id="copy-area">
                <div class="container">
                    <div class="col-md-12">
                        <p>@Desenvolvido por <a href="" target="_blank">TCC Group</a> &copy; 2021</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--Scripts -->
        <script src="js/scripts.js"></script>
    </body>
</html>