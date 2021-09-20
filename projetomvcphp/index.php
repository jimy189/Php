<?php
require_once 'Core/Core.php';
require_once 'Controller/HomeController.php';
require_once 'Controller/ErroController.php';
require_once 'Controller/PostController.php';
require_once 'Controller/SobreController.php';
require_once 'Controller/AdminController.php';
require_once 'Model/Postagem.php';
require_once 'Model/Comentario.php';
require_once 'lib/Database/Connection.php';

require_once 'vendor/autoload.php';
$template = file_get_contents('Template/estrutura.html');


//Pega o retorno e bota numa variavel
ob_start();
$core = new Core;
// Requisição Get para visuzalizar a pagina requerida $_GET
$core ->start($_GET);

//Pega função do core e seus dados e armazena na $saida
    $saida = ob_get_contents();
ob_end_clean();


$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplPronto;