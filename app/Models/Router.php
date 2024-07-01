<?php
/**
 * @class     : Router
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * @*Classe para gerenciar a requisição de rota para o seu respectivo roteador*@
 */

namespace App\Models;

class Router
{
    public mixed $route;
    public string $root_path;
    public string $router_file;

    // Método que vai tratar a requisição na url para um array
    public function get_route(): array
    {
        // Define um array de retorno vazio para caso de erros
        $return = [];

        // Verifica se a propriedade de url request recebeu algum conteudo
        if(empty($this->route))
        {
            // Define a propriedade de url request como vazio
            $this->route = $return;

            // Retorna o array de retorno vazio
            return $return;
        }
        else
        {
            // Elimina a barra inicial da requisição crua da URL
            $this->route = substr($this->route, 1);

            // Cria o array de requisição separada por '/'
            $this->route = explode('/', $this->route);

            // Retorna o array de requisição
            return $this->route;
        }
    }

    // Método que vai identificar o roteador correspondente a requisição da URL
    public function get_router(): string
    {
        // Verifica o indice 0 do array de rota, a definir o padrão 'home' caso não tenha nenhum valor
        if (empty($this->route[0])) {
            // Define o indice 0 do array de rota como 'home'
            $this->route[0] = 'web';
        }

        // Verifica se o arquivo do roteador existe
        if (file_exists($this->root_path . 'app/Routes/' . $this->route[0] . '.php'))
        {
            // Define o caminho do arquivo do roteador
            $this->router_file = $this->root_path . 'app/Routes/' . $this->route[0] . '.php';
        }
        else
        {
            $this->router_file = $this->root_path . 'app/Routes/web.php';
        }

        // Retorna o caminho do arquivo do roteador
        return $this->router_file;
    }
}