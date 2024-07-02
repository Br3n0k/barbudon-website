<?php
/**
 * @class     : Aplication
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Classe para gerenciar a aplicação de forma geral, sendo utilizada como o kernel do sistema
 */

namespace App\Config;

use JetBrains\PhpStorm\NoReturn;
use App\Models\Database;
use App\Models\Router;

class Aplication
{
    /**
     *  Propriedades relacionadas a essa classe da aplicação de forma geral
     */
    // Propriedade que vai servir como array de transporte de dados
    // entre diferentes arquivos incluidos por essa classe
    public array $data;
    public string $root_path;   // Propriedade que vai armazenar o caminho fisico dos arquivos do sistema.
    public string $request_method; // Propriedade que vai armazenar o metodo da requisição. (Inutil por enquanto)
    public string $request_url;  // Propriedade que vai armazenar a requisição URI vinda da URL para ser tratada no roteamento do sistema.


    /**
     * Propriedades relacionadas ao roteamento e Model Router.php
     */
    public array $route;    // Propriedade que vai armazenar a rota já em array tratada na Router.php.
    public string $router_file; // Propriedade que vai armazenar o arquivo roteador correspondente a requisição.


    /**
     *  Propriedades relacionadas aos controllers
     */
    public string $controller;  // Propriedade que vai armazenar o controlador atual da requisição


    /**
     * Propriedades relacionadas a API do sistema
     */
    public array $api_response; // Propriedade que vai armazenar as respostas da API


    /**
     * Propriedades que irão armazenar outros models e classes a serem importadas durante o sistema
     */
    public mixed $database; // Propriedade que vai armazenar o model de Database.php
    public mixed $router;   // Propriedade que vai armazenar o model de Router.php


    /**
     * Propriedades que irão armazenar indicadores de erros vindo da classe e outras classes do sistema
     * para a classe geral da aplicação
     */
    public int $error_code; // Propriedade que vai armazenar os codigos de erro do sistema
    public string $error_message;   // Propriedade que vai armazenas as mensagens de erro do sistema


    // Classe construtora
    public function __construct()
    {
        // Pendente de implementação
    }

    // Função que vai iniciar a aplicação
    public function start(): void
    {
        // Verifica se recebeu a requisição da URL e ele não é nulo
        if(empty($this->request_url) OR empty($this->root_path))
        {
            // Define o retorno para o erro
            $this->error_code = 500;
            $this->error_message = 'Falha interna do sistema 2.';

            // Retorna o erro
            $this->error();
        }
        else
        {
            // Instancia a classe de conexão com o banco de dados, e abre a conexão
            $this->database = new Database();

            // Instancia a classe de roteamento
            $this->router = new Router();

            // Passsa para classe de rotas o root path da aplicação
            $this->router->root_path = $this->root_path;

            // Passa a requisição da url para a propriedade do roteador
            $this->router->route = $this->request_url;

            // Chama a função que vai tratar a rota com o roteador
            $this->route = $this->router->get_route();

            // Chama a função que vai tratar a rota com o roteador
            $this->router_file = $this->router->get_router();

            // Verificar se a conexão com o banco de dados falhou
            if($this->database->open() === false)
            {
                // Define o retorno para o erro
                $this->error_code = $this->database->error_code;
                $this->error_message = $this->database->error;

                // Retorna o método de erro
                $this->error();
            }
            else
            {
                // Inclui e carrega o arquivo do roteador
                include_once($this->router_file);
            }
        }
    }

    // Função de configuração da aplicação
    public function configure($root_path, $request_url): bool
    {
        // Verifica se recebeu conteudo de root path e ele não é nulo
        if(empty($root_path))
        {
            // Define o retorno para o erro
            $this->error_code = 501;
            $this->error_message = 'Falha na definição da pasta raiz do sistema.';

            // Retorna falso
            return false;
        }
        else
        {
            // Define a propriedade e root path para a classe da aplicação
            $this->root_path = $root_path;

            // Verifica se recebeu o conteudo de requisição da URL e ele não é nulo
            if(empty($request_url))
            {
                // Define o retorno para o erro
                $this->error_code = 501;
                $this->error_message = 'Falha no armazenamento da URL solicitada.';

                // Retorna falso
                return false;
            }
            else
            {
                // Define a propriedade e requisição da URL para a classe da aplicação
                $this->request_url = $request_url;

                // Define a propriedade do tipo de requisição para a classe da aplicação
                $this->request_method = $_SERVER['REQUEST_METHOD'];

                // Retorna verdadeiro
                return true;
            }
        }
    }

    // Função que vai trabalhar os erros no sistema
    #[NoReturn] public function error(): void
    {
        // Verifica se a propriedade error_code foi inicializada
        if(!empty($this->error_code) AND !empty($this->error_message))
        {
            // Define o retorno para o erro
            http_response_code($this->error_code);
            echo $this->error_message;
        }
        else
        {
            // Define o retorno para o erro
            http_response_code(500);
            echo 'Erro interno do sistema.';
        }
        exit();
    }
}