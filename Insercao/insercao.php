<?php
include_once 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quant']) && isset($_POST['descr']) && isset($_POST['dataR']) && isset($_POST['dataV'])) {
        if (empty($_POST['nome']) && empty($_POST['preco']) && empty($_POST['quant']) && empty($_POST['descr']) && empty($_POST['dataR']) && empty($_POST['dataV'])) {
            $msg = "Erro: Os campos não podem ser vazios";
            header("Location: index.php?msg=" . urldecode($msg));
        } else {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quant'];
            $descricao = $_POST['descr'];
            $datarecebimento = $_POST['dataR'];
            $datavalidade = $_POST['dataV'];
            try {
                $sql = "INSERT INTO itens ( nome, preco, quant, descr, dataR, dataV) VALUES (:nome, :preco, :quant, :descr, :dataR, :dataV)";
                $query = $conexao->prepare($sql);
                $query->bindValue(':nome', $nome);
                $query->bindValue(':preco', $preco);
                $query->bindValue(':quant', $quantidade);
                $query->bindValue(':descr', $descricao);
                $query->bindValue(':dataR', $datarecebimento);
                $query->bindValue(':dataV', $datavalidade);

                $query->execute();


                $msg = "Produto Adicionado";
                header("Location: ../home/index.html?msg=" . urldecode($msg));

            } catch (PDOException $e) {
                $msg = "Erro ao inserir o produto: " . $e->getMessage();
                header("Location: ../home/index.html?msg=" . urldecode($msg));
            }
        }
    } else {
        $msg = "Erro: Os campos não existem ou foram definidos como nulos.";
        header("Location: indexsite.php?msg=" . urldecode($msg));




    }
} else {
    $msg = "Erro : Metódo de requisição inválido.";
    header("Location: indexsite.php?msg=" . urldecode($msg));


}






?>