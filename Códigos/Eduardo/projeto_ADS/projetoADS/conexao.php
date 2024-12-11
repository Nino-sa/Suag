<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = "";
    $banco = "suag_br";

    $conexão = new mysql($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){
        die("Conexão Falhou: " . $conexao->connect_error);

    }
    echo "Conexão bem-sucedida <hr>";


?>