<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php
    session_start();
    if (isset($_SESSION['logado'])){
        header('Location: listar.php');
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Coleta os dados do formulário
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            if($usuario=="aluno" && $senha=="iftm"){
                $_SESSION["logado"] = true;
                header('Location: listar.php');
            } else {
                echo "<div class='alert alert-danger'>Usuário e/ou senha inválidos.</div>";
            }
        }
    }
?>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form role="form" method="post" action="login.php">
                            <div class="form-group row">
                                <label for="inputUsuario" class="col-sm-3 col-form-label">Usuário</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuário">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSenha" class="col-sm-3 col-form-label">Senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" value="Login" name="submit" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>