
<?php
//livro: título, idioma, quantidade de páginas, editora, data da publicação, ISBN.
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `livro` (`id`, `título`, `idioma`, `qtd_pag`, `editora`, `data_publi`, `isbn`) VALUES (NULL, :tt, :idi, :qtd, :ed, :publi, :rg);";

$preco = str_replace(',', '.', $_GET['preco']);
    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('tt' => $_GET['titulo'], 'idi' => $_GET['idioma'], 'qtd' => $_GET['qtdpg'], 'ed' => $_GET['editora'], 'publi' => $_GET['date'], 'rg' => $_GET['isbn']));

        if($resultado){
            echo "Comando executado!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;

        header("Location: envialivro.php");
?>