<!DOCTYPE html>
<html lang="pt-br">
    <link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Calcular Tempo de Trabalho</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1 class="titulo">Calcule seu Tempo de Trabalho</h1>
    <form method="post" class="form" action="">
        <label for="admission_date" class="admissao">Data de Admissão:</label>
        <input type="date" id="admission_date" class="admissao_input" name="admission_date" required>
        <br><br>
        <label for="resignation_date" class="demissao" >Data de Demissão:</label>
        <input type="date" id="resignation_date" class="demissao_input" name="resignation_date" required>
        <br><br>
        <button type="submit" class="botao">Calcular Tempo de Trabalho</button>
    </form>
 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admission_date = $_POST['admission_date'];
        $resignation_date = $_POST['resignation_date'];
 
        if (!empty($admission_date) && !empty($resignation_date)) {
            $admissionDate = new DateTime($admission_date);
            $resignationDate = new DateTime($resignation_date);
            $interval = $resignationDate->diff($admissionDate);
 
            if ($resignationDate >= $admissionDate) {
                echo "<div class='result'>";
                echo "<h2>Resultado:</h2>";
                echo "Você trabalhou " . $interval->y . " anos, " . $interval->m . " meses e " . $interval->d . " dias.";
                echo "</div>";
            } else {
                echo "<p style='color:red;'>A data de demissão deve ser posterior à data de admissão.</p>";
            }
        } else {
            echo "<p style='color:red;'>Por favor, insira datas válidas.</p>";
        }
    }
    ?>
</body>
</html>