<?php
class Conexao
{
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $port, $database, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function desconectar()
    {
        $this->pdo = null;
    }

    function conectar()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function executar($query)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            // Se for uma consulta SELECT, retorna os resultados
            if (stripos($query, 'SELECT') === 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            // Se for INSERT, UPDATE, DELETE, retorna true para sucesso
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}