<?php
$arq = "produtos.csv";
if (!file_exists($arq))
{
    die("
        <h2>Arquivo ainda não existe.</h2>
        <p>Cadastre pelo menos um produto primeiro.</p>
        <a href='index.php'>Voltar para o cadastro</a>
    ");
}

$fp = fopen($arq, "r");

$header = fgetcsv($fp, 1000, ";");
?>

<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos Cadastrados</title>
    <link rel="stylesheet" href="CSS/csv.css">
</head>
<body>
    <div class="container">
        <h1>Produtos Cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <?php
                    foreach ($header as $col) {
                        echo "<th>" . htmlspecialchars($col) . "</th>";}
                    ?>
                </tr>
            </thead>

            <tbody>
                <?php
                $total = 0;
                while (($dados = fgetcsv($fp, 1000, ";")) !== false)
                {
                    echo "<tr>";
                        foreach ($dados as $valor) {
                            echo "<td>" . htmlspecialchars($valor) . "</td>";
                        }
                    echo "</tr>";
                    $total++;
                }
                fclose($fp);
                ?>
            </tbody>
        </table>

        <div class="quantidade">
            Total de produtos cadastrados:
            <strong><?php echo $total; ?></strong>
        </div>

        <div class="botoes">
            <a href="index.php" class="botao voltar">
                ← Voltar para o cadastro
            </a>
        </div>
    </div>
</body>
</html>