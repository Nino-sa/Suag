<?php
include_once("Conexão.php");

try {
    $cod = isset($_GET['cod']) ? $_GET['cod'] : null;
    if ($cod === null || !is_numeric($cod)) {
        throw new Exception("ID inválido ou não fornecido.");
    }

    $sql = "SELECT * FROM itens WHERE id = :cod";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':cod' => $cod]);
    $itens = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($itens) {
        echo ("<p id='r1'> COD:" . $itens['id'] . "</p>");
        echo ("<p id='r2'> NOME:" . $itens['nome'] . "</p>");
        echo ("<p id='r3'> PREÇO:" . $itens['preco'] . "</p>");
        echo ("<p id='r4'> QUANT:" . $itens['quant'] . "</p>");
        echo ("<p id='r5'> DESCR:" . $itens['descr'] . "</p>");
        echo ("<p id='r6'> DATA RECEBIMENTO:" . $itens['dataR'] . "</p>");
        echo ("<p id='r7'> DATA VALIDADE:" . $itens['dataV'] . "</p>");
    } else {
        echo ("<p id='r8'> Nenhum item encontrado <p>");
    }

} catch (PDOException $e) {
    echo 'Erro Banco: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erro' . $e->getMessage();
}