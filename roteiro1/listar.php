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
// Instanciar uma nova conexão
$conexao = new Conexao("localhost", "3306", "fundos_db", "root", "1234");

// Conectar à base de dados
$fundos = [];
if ($conexao->conectar()) {
    // Executar a consulta dos fundos no banco de dados e criar um array para mostrar na tela os fundos
    $result = $conexao->executar("SELECT * FROM fundos ORDER BY data DESC");
    
    if ($result) {
        $fundos = $result;
    }
    
    // Desconectar da base de dados
    $conexao->desconectar();
}

?>

<body>
    <div class="container">
        <div class="row mt-4 mb-4">
            <h2 class="mr-auto">Lista de Fundos Imobiliários</h2>
            <a href="cadastrarForm.php" class="btn btn-info mr-2" role="button">Cadastrar</a>
            <a href="logout.php" class="btn btn-danger" role="button">Logout</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ticker</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
               <!-- lógica para exibir os fundos recuperados no banco da tela -->
               <?php if (count($fundos) > 0): ?>
                    <?php foreach ($fundos as $fundo): ?>
                        <tr>
                            <td><?php echo $fundo['nome']; ?></td>
                            <td><?php echo $fundo['ticker']; ?></td>
                            <td>R$ <?php echo number_format($fundo['valor'], 2, ',', '.'); ?></td>
                            <td><?php echo $fundo['quantidade']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($fundo['data'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
               <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum fundo cadastrado</td>
                    </tr>
               <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>