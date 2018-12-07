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

$sessao = new Sessao();
if (isset( $_GET ["iniciar"])) {
    $id = 1;
    $nivel = 1;
    $login = "giovanildo";
    $sessao->criaSessao($id, $nivel, $login);    
    echo "usuário " . $login . " está logado ";
}

if (isset( $_GET ["sair"])) {
    $usuario = $sessao->getLoginUsuario();
    $sessao->mataSessao();
    echo "fechando a sessão  do usuário " . $usuario;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lombras Liga</title>
<meta name="viewport" cont