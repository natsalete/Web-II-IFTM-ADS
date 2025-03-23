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
if (!isset($_SESSION['logado'])){
    header('Location: login.php');
} 
require("Conexao.php");
require("FundoImobiliario.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $ticker = $_POST['ticker'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];

    // Valida os dados do formulário
    $valido = true;
    if (empty($nome) || empty($ticker) || empty($valor) || empty($quantidade) || empty($data)) {
        echo "<div class='alert alert-danger'>Todos os campos são obrigatórios!</div>";
        $valido = false;
    }

    if ($valido) {
        // Instanciar uma nova conexão
        $conexao = new Conexao("localhost", "3306", "fundos_db", "root", "1234");
        
        // Conectar à base de dados
        if ($conexao->conectar()) {
            // Criar objeto de fundo imobiliário
            $fundo = new FundoImobiliario($nome, $ticker, $valor, $quantidade, $data);
            
            // Executar a inserção de um fundo no banco de dados
            $query = "INSERT INTO fundos (nome, ticker, valor, quantidade, data) VALUES (
                '{$fundo->getNome()}', 
                '{$fundo->getTicker()}', 
                {$fundo->getValor()}, 
                {$fundo->getQuantidade()}, 
                '{$fundo->getData()}'
            )";
            
            if ($conexao->executar($query)) {
                echo "<div class='alert alert-success'>Fundo cadastrado com sucesso!</div>";
                // Redirecionar para a página de listagem após 2 segundos
                header("refresh:2;url=listar.php");
            } else {
                echo "<div class='alert alert-danger'>Erro ao cadastrar o fundo!</div>";
            }
            
            // Desconectar da base de dados
            $conexao->desconectar();
        } else {
            echo "<div class='alert alert-danger'>Erro ao conectar ao banco de dados!</div>";
        }
    }
}
?>

<body>
    <div class="container">
        <div class="row mt-4 mb-4">
            <a href="listar.php" class="btn btn-info mr-2" role="button">Voltar</a>
            <h2 class="ml-2">Cadastrar Novo Fundo Imobiliário</h2>
        </div>
        <form role="form" class="mt-3" method="post" action="cadastrarForm.php">
            <!-- aqui será criado o formulário para enviar os dados do funco a ser inserido no banco -->
            <div class="form-group row">
                <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome do Fundo" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTicker" class="col-sm-2 col-form-label">Ticker</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTicker" name="ticker" placeholder="Código do Fundo (ex: HGLG11)" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" id="inputValor" name="valor" placeholder="Valor da cota" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputQuantidade" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputQuantidade" name="quantidade" placeholder="Quantidade de cotas" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputData" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputData" name="data" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>