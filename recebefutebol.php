<?php

$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `time` (`id`, `nome`, `pontos`) VALUES (NULL, :nometime, :qntdpontos);";

    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nometime' => $_GET['nome'], 'qntdpontos' => $_GET['pontos']));

        if($resultado){
            echo "Comando executado!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;

        header("Location: enviafutebol.php");
?>