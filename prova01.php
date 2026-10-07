<?php
session_start();

if (!isset($_SESSION['guardado'])) {
    $_SESSION['guardado'] = array();
}

if (isset($_POST['calcular'])) {
    $altura = (float)$_POST['altura'];
    $comprimento = (float)$_POST['comprimento'];
    $area = $altura * $comprimento;

    if ($altura == $comprimento) {
        $tipo = "Quadrado";
    } elseif ($altura > $comprimento) {
        $tipo = "Retângulo Vertical";
    } else {
        $tipo = "Retângulo Horizontal";
    }

    $resultado_texto = "Altura: $altura | Comprimento: $comprimento | Tipo: $tipo | Área: $area";
    $_SESSION['guardado'][] = $resultado_texto;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova02</title>
</head>
<body>
    <h2>Calculadora de Área e Formato</h2>
    <form method="POST" action="">
        <label for="altura">Altura:</label>
        <input type="number" step="any" name="altura" id="altura" required>
        <br><br>
        
        <label for="comprimento">Comprimento:</label>
        <input type="number" step="any" name="comprimento" id="comprimento" required>
        <br><br>
        
        <button type="submit" name="calcular">Calcular</button>
        <button type="submit" name="btn_listar">Listar Armazenados</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        echo "<h3>Resultado:</h3>";
        echo "<p><strong>" . $tipo . "</strong></p>";
        echo "<p>Área: " . $area . "</p>";
    }

    if (isset($_POST['btn_listar'])) {
        echo "<h3>Itens Armazenados:</h3>";
        if (!empty($_SESSION['guardado'])) {
            echo "<ul>";
            foreach ($_SESSION['guardado'] as $item) {
                echo "<li>" . $item . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum item armazenado.</p>";
        }
    }
    ?>
</body>
</html>


