<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

define("CONFIG_LOMBRAS", "/home/giovanildo/Projetos/lombrasliga-web/lombras.ini");
$config = parse_ini_file(CONFIG_LOMBRAS);
define("NOME_INSTITUICAO", $config['nome_instituicao']);
define("PAGINA_INSTITUICAO", $config['pagina_instituicao']);

function __autoload($classe)
{
    if (file_exists('classes/dao/' . $classe . '.php')) {
        include_once 'classes/dao/' . $classe . '.php';
    }
    if (file_exists('classes/model/' . $classe . '.php')) {
        include_once 'classes/model/' . $classe . '.php';
    }
    if (file_exists('classes/controller/' . $classe . '.php')) {
        include_once 'classes/controller/' . $classe . '.php';
    }
    if (file_exists('classes/util/' . $classe . '.php')) {
        include_once 'classes/util/' . $classe . '.php';
    }
    if (file_exists('classes/view/' . $classe . '.php')) {
        include_once 'classes/view/' . $classe . '.php';
    }
}

$sessao = new Sessao();
if (isset($_GET["iniciar"])) {
    $id = 1;
    $nivel = 1;
    $login = "giovanildo";
    $sessao->criaSessao($id, $nivel, $login);
    echo "usuário " . $login . " está logado ";
}

if (isset($_GET["sair"])) {
    $usuario = $sessao->getLoginUsuario();
    $sessao->mataSessao();
    echo "fechando a sessão  do usuário " . $usuario;
}

HomeView::main();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lombras Liga</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- meta tag para responsividade em Windows e Linux -->
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/js.js"></script>


<body>

	<div class="pagina doze colunas">
		<div class="topo doze linha fundo-branco">
			<div class="conteudo">
				<div class=""logo-lombras">
				<?php
    echo '<a href="' . PAGINA_INSTITUICAO . '"> <img alt="logotipo lombras" src="img/logo_' . NOME_INSTITUICAO . ' .png" title="Lombras Liga"> </a>';
    ?>
				</div>
				<div id="logo-lombras2">
				
				</div>
			</div>

		</div>

	</div>

</body>

</html>


