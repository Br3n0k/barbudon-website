<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $port;
    private $database;
    private $user;
    private $pass;
    private $charset;
    private $pdo;
    private $error_code;
    private $error;
    private $stmt;

    public function __construct()
    {
        $this->host = $_ENV['DATABASE_HOST'];
        $this->database = $_ENV['DATABASE_NAME'];
        $this->user = $_ENV['DATABASE_USER'];
        $this->pass = $_ENV['DATABASE_PASSWORD'];
        $this->port = $_ENV['DATABASE_PORT'];
        $this->charset = $_ENV['DATABASE_CHARSET'];

        $dns = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset;port=$this->port";
        $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
        ];

        try
        {
            $this->pdo = new PDO($dns, $this->user, $this->pass, $options);
        }
        catch (PDOException $e)
        {
            $this->error_code = $e->getCode();
            $this->error = $e->getMessage();
            echo "Falha de conexão com o PDO: " . $this->error;
            exit();
        }
    }

    // Método para preparar a query
    public function query($query): void
    {
        $this->stmt = $this->pdo->prepare($query);
    }

    // Método para vincular valores
    public function bind($param, $value, $type = null): void
    {
        if (is_null($type))
        {
            switch (true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Método para executar a query
    public function execute() {
        return $this->stmt->execute();
    }

    // Método para obter os resultados
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Método para obter uma única linha
    public function single() {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Método para obter a contagem de linhas
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}