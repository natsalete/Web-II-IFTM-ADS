# Web-II-IFTM-ADS  

Este repositório contém exercícios práticos da disciplina **Web II** do curso de **Análise e Desenvolvimento de Sistemas (ADS)** do IFTM.  

## 📌 Exercício 01 - W3Newbie  

### 📄 Descrição  
O exercício segue o roteiro fornecido no documento abaixo:  

📄 [Exercício - Bootstrap - Roteiro.pdf](https://github.com/user-attachments/files/19228831/Exercicio.-.Bootstrap-.Roteiro.pdf)  

### 🛠 Tecnologias Utilizadas  
- HTML5  
- CSS3  
- Bootstrap  

---

## 📌 Exercício 02 - roteiro1 - Cadastro de Fundos Imobiliários  

### 📄 Descrição  
O exercício consiste em completar o código seguindo os comentários e implementar a lógica necessária para cadastrar e listar **Fundos Imobiliários** no banco de dados.  

### 📌 Estrutura do Código  

#### 📌 `cadastrarForm.php`  
Este arquivo é responsável pelo processamento do formulário de cadastro de um fundo imobiliário. A implementação segue os seguintes passos:  

1. **Verificar se a requisição é do tipo POST**  
2. **Coletar os dados enviados pelo formulário**  
3. **Validar os dados recebidos**  
4. **Instanciar e conectar-se ao banco de dados**  
5. **Executar a inserção dos dados na base**  

Exemplo de estrutura:  

```php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar os dados do formulário
    // Validar os dados recebidos
    // Instanciar e conectar-se ao banco de dados
    // Inserir os dados no banco
}
```
```html
<body>
    <div class="container">
        <form role="form" class="mt-5" method="post" action="cadastrarForm.php">
            <!-- Criar os campos do formulário para cadastrar um fundo imobiliário -->
        </form>
    </div>
</body>
```

📌 `listar.php`  
Este arquivo é responsável por recuperar e exibir os fundos cadastrados. A implementação segue os seguintes passos:

1. **Importar as classes necessárias (`Conexao.php`, `FundoImobiliario.php`)**  
2. **Instanciar e conectar-se ao banco de dados**  
3. **Executar a consulta dos fundos**  
4. **Exibir os dados na tabela**  
5. **Finalizar a conexão com o banco**  

Estrutura do código:

```php
require("Conexao.php");
require("FundoImobiliario.php");

// Criar a conexão com o banco
// Consultar os fundos cadastrados
// Exibir os dados na tela
// Fechar a conexão
```
```html
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
        <!-- Lógica para exibir os fundos cadastrados -->
    </tbody>
</table>
```


