<?php
// Percorre os arquivos de páginas em resource para incluir na aplicação
switch ($this->route[0]) {
    case 'login':
        include($this->root_path . 'resources/views/pages/login.php');
        break;
    default:
        include($this->root_path . 'resources/views/pages/home.php');
        break;
}
