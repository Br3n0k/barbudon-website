<?php
/**
 * @file     : api.php
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Arquivo de roteamento para requisições de navegação da parte de api do frontend
 */

// Define o caminho para o controlador
$this->controller = $this->root_path . 'app/Controllers/Api.php';

// Inclui o controlador
include_once($this->controller);