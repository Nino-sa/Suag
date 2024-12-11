<?php
    require_once 'conexao.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quantidade']) && isset($_POST['descricao']) && isset($_POST['datareceb']) && isset($_POST['validade'])){
            if(empty($_POST['nome']) && empty($_POST['preco']) && empty($_POST['quantidade']) && empty($_POST['descricao']) && empty($_POST['datareceb']) && empty($_POST['validade'])){
            $msg = "Erro: Os campos não podem ser vazios";
            header("Location: index.php?msg=".urldecode($msg));      
        }else{
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];
            $descricao = $_POST['descricao'];
            $datarecebimento = $_POST['datareceb'];
            $datavalidade = $_POST['validade'];
            try{
                $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, datarecebe, validade) VALUES (:nome, :preco, :quantidade, :descricao, :datarecebe, :validade)";
                $query = $conexao->prepare($sql);
                $query->bindValue(':nome', $nome);
                $query->bindValue(':preco', $preco);
                $query->bindValue(':quantidade', $quantidade);
                $query->bindValue(':descricao', $descricao);
                $query->bindValue(':datarecebe',$datarecebimento);
                $quety->bindValue(':validade',$datavalidade);
           
                $query->execute();


                $msg ="Produto Adicionado";
                header("Location: indexsite.php?msg=" . urldecode($msg));
               
            }catch(PDOException $e){
                $msg= "Erro ao inserir o produto: " . $e-getMessage();
                header("Location: indexsite.php?msg=" . urldecode($msg));
            }
        }
    }else{
        $msg = "Erro: Os campos não existem ou foram definidos como nulos.";
        header("Location: indexsite.php?msg=" . urldecode($msg));




    }
    }else{
        $msg = "Erro : Metódo de requisição inválido.";
        header("Location: indexsite.php?msg=" . urldecode($msg));


    }






?>