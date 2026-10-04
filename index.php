<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form action="cadastro.php" method="POST">
            <!-- <label for="codigo">Código: </label>
            <input type="text" id="codigo" name="codigo" placeholder="Digite o código" required> -->

            <label for="nome">Nome do Produto: </label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>

            <label for="categoria">Categoria: </label>
            <input type="text" id="categoria" name="categoria" placeholder="Digite a categoria" required>

            <label for="preco">Preço: </label>
            <input type="number" id="preco" name="preco" step="0.01" placeholder="0.00" required>

            <label for="quantidade">Quantidade: </label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Digite a quantidade" required>

            <div class="botoes">
                <button type="submit" class="btn-cadastrar">Cadastrar Produto</button>
            </div>
        </form>

        <form action="abrir_csv.php" method="GET">
            <button type="submit" class="btn-abrir">Abrir arquivo CSV</button>
        </form>

        <div class="observacao">
            Sistema simples de cadastro de produtos
        </div>
    </div>
</body>
</html>