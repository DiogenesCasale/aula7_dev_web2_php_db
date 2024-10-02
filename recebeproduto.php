<?php
//nome, url da foto, descrição, preço
$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `produto` (`id`, `nome`, `url`, `descricao`, `preco`) VALUES (NULL, :nometime, :urlimg, :descr, :precoproduto);";

$preco = str_replace(',', '.', $_GET['preco']);
    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nometime' => $_GET['nome'], 'urlimg' => $_GET['url'], 'descr' => $_GET['descricao'], 'precoproduto' => $preco));

        if($resultado){
            echo "Comando executado!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;

        header("Location: enviaproduto.php");
?>