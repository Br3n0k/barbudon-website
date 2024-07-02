<?php
/**
 * @file     : web.php
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Arquivo de roteamento para requisições de navegação da parte web do frontend
 */


// Coleta todos os controladores da aplicação
$controllers = array_diff(scandir($this->root_path . 'app/Controllers'), array('..', '.'));

// Variavel que vai rastrear se um controlador foi encontrado
$controller_found = false;

// Armazena o nome do controlador padrao em caso de erros
$this->controller = 'Home.php';


// Percorre os arquivos de controladores
foreach ($controllers as $controller)
{
    // Pega apenas o nome do arquivo sem a extensão
    $controller = explode('.', $controller)[0];

    // Converte o nome do arquivo para minusculo
    $controller_name = strtolower($controller);

    // Verifica se a requisição na route[0] é igual ao nome do controlador
    if ($this->route[0] == $controller_name)
    {
        // Define o nome do controlador encontrado
        $this->controller = $controller . '.php';

        // Constroi o caminho do arquivo de controlador
        $controller_path = $this->root_path . 'app/Controllers/' . $this->controller;

        // Verifica se o controlador existe
        if (file_exists($controller_path))
        {
            // Define que o controlador foi encontrado
            $controller_found = true;

            // Inclui o controlador
            include_once($controller_path);
        }

        // Caso o controlador não exista retorna o erro
        else
        {
            // Constroi o retorno do erro para o controlador não encontrado
            $this->error_code = 404;
            $this->error_message = 'Controlador não encontrado';

            // Retorna o erro pela classe da aplicação
            $this->error();
            $controller_found = true;
        }

        // Encerra o foreach
        break;
    }
}

// Se nenhum controlador for correspondente com os arquivos de controladores
if (!$controller_found)
{
    // Constroi o caminho até o arquivo controlador padrão Home.php
    $controller_path = $this->root_path . 'app/Controllers/' . $this->controller;

    // Verifica se o arquivo de controlador existe
    if (file_exists($controller_path))
    {
        // Inclui o controlador padrão
        include($controller_path);
    }
    else
    {
        // Constroi o retorno do erro para o controlador não encontrado
        $this->error_code = 404;
        $this->error_message = 'Falha, o controlador padrão não foi encontrado.';

        // Retorna o erro pela classe da aplicação
        $this->error();
    }
}