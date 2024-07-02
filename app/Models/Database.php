<?php
/**
 * @class     : Database
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Classe que gerencia a conexão com o banco de dados utilizando as informações de conexão do dotenv
 */

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private int $port;
    private string $database;
    private string $user;
    private string $pass;
    private string $charset;
    private mixed $pdo;
    public int $error_code;
    public string $error;
    private mixed $stmt;

    // Classe construtora
    public function __construct()
    {
        // Realiza a alimentação das propriedades da classe com as informações do dotenv
        $this->host = $_ENV['DATABASE_HOST'];
        $this->database = $_ENV['DATABASE_NAME'];
        $this->user = $_ENV['DATABASE_USER'];
        $this->pass = $_ENV['DATABASE_PASSWORD'];
        $this->port = $_ENV['DATABASE_PORT'];
        $this->charset = $_ENV['DATABASE_CHARSET'];
    }

    // Método para Abrir a conexão com o banco de dados
    public function open(): bool
    {
        // Constroi o DNS de abertura da conexão com o banco de dados
        $dns = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset;port=$this->port";

        // Constroi os parametros de opções para abertura da conexão com o banco de dados com o PDO
        $dns_options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

        try
        {
            $this->pdo = new PDO($dns, $this->user, $this->pass, $dns_options);
        }
        catch (PDOException $e)
        {
            // Armazena o codigo de erro e a mensagem de erro
            $this->error_code = $e->getCode();
            $this->error = $e->getMessage();

            // Retorna falso para sinalizar que a abertura da conexão falhou
            return false;
        }

        // Retorna verdadeiro para sinalizar a abertura da conexão
        return true;
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