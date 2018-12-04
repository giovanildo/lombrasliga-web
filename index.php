<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

define ( "CONFIG_LOMBRAS", "/home/giovanildo/Projetos/lombrasliga-web/lombras.ini" );
$config = parse_ini_file ( CONFIG_LOMBRAS );
define ( "NOME_INSTITUICAO", $config ['nome_instituicao'] );
define ( "PAGINA_INSTITUICAO", $config ['pagina_instituicao'] );

function __autoload($classe) {
    if (file_exists ( 'classes/dao/' . $classe . '.php' )) {
        include_once 'classes/dao/' . $classe . '.php';
    }
    if (file_exists ( 'classes/model/' . $classe . '.php' )) {
        include_once 'classes/model/' . $classe . '.php';
    }
    if (file_exists ( 'classes/controller/' . $classe . '.php' )) {
        include_once 'classes/controller/' . $classe . '.php';
    }
    if (file_exists ( 'classes/util/' . $classe . '.php' )) {
        include_once 'classes/util/' . $classe . '.php';
    }
    if (file_exists ( 'classes/view/' . $classe . '.php' )) {
        include_once 'classes/view/' . $classe . '.php';
    }
}

echo PAGINA_INSTITUICAO;

?>