<?php
// $codigo = $_POST['codigo'] ?? '';
$nome = $_POST['nome'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$preco = $_POST['preco'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';

if (empty($nome) || empty($categoria) || empty($preco) || empty($quantidade))
{
    die("Erro: todos os campos devem ser preenchidos.");
}

$arq = "produtos.csv";

// $fp = fopen($arq, "a");

if (!file_exists($arq))
{
    $num = 1;
    $fp = fopen($arq, "w");
    fputcsv($fp, array("Código", "Nome", "Categoria", "Preço", "Quantidade"),";");
    fclose($fp);
}
else
{
    $fp = fopen($arq, "r");
    fgetcsv($fp, 1000, ";");    
    $num = 0;

    while (($dados = fgetcsv($fp, 1000, ";")) !== false)
    {
        $num = intval($dados[0]);
    }

    fclose($fp);
    $num++;
}

$codigo = str_pad($num, 4, "0", STR_PAD_LEFT);

$fp = fopen($arq, "a");

fputcsv($fp, array($codigo, $nome, $categoria, $preco, $quantidade),";");

fclose($fp);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro realizado</title>
    <link rel="stylesheet" href="CSS/cadastro.css">
</head>
<body>
    <div class="mensagem">
        <h1>Cadastro realizado!</h1>
        <p>Os dados foram inseridos no arquivo CSV com sucesso.</p>
        <div class="dados">
            <strong>Código:</strong>
            <?php echo htmlspecialchars($codigo); ?>

            <br><br>

            <strong>Produto:</strong>
            <?php echo htmlspecialchars($nome); ?>

            <br><br>

            <strong>Categoria:</strong>
            <?php echo htmlspecialchars($categoria); ?>

            <br><br>

            <strong>Preço:</strong>
            R$ <?php echo htmlspecialchars($preco); ?>

            <br><br>

            <strong>Quantidade:</strong>
            <?php echo htmlspecialchars($quantidade); ?>
        </div>

        <a href="index.php">Cadastrar outro produto</a>

        <a href="abrir_csv.php" class="verde">Abrir arquivo CSV</a>
    </div>
</body>
</html>