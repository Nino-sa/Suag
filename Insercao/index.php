<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUAG - Cadastro</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>

<body>
    <header class="menu">
        <div id="faixa"></div>
        <h2 id="titulo">SUAG - Cadastro</h2>
    </header>
    <form action="./insercao.php" method="post">

        <fieldset id="conteudo">
            <label for="nome">Insira o nome do produto: </label>
            <input type="text" id="nome" name="nome">
            <label for="preco">Insira o preço do produto: </label>
            <input type="text" id="preco" name="preco">
            <label for="quant">Insira a quantidade de produto: </label>
            <input type="number" id="quant" name="quant">
            <label for="descr">Insira uma descrição do produto: </label>
            <input type="text" id="descr" name="descr">
            <label for="dataR">Insira a data de recebimento do produto: </label>
            <input type="date" id="dataR" name="dataR">
            <label for="dataV">Insira a data de validade do produto: </label>
            <input type="date" id="dataV" name="dataV">
        </fieldset>
        <div id="botões">
            <button id="submit" action="submit">Cadastrar</button>
            <button type="button" onclick="Voltar()">Voltar ao inicio</button>
        </div>
    </form>

    </div>
</body>

</html>