<?php
require_once "../verifica_sessao.php";

if (!isset($_GET['id'])) {
    //formulário em branco
    $id = 0;
    $nome = "";
    $area = "";
    $carga_horaria = "";
} else {
    //formulário preenchido
    $id = $_GET['id'];

    $sql = "SELECT * FROM curso WHERE idcurso = $id";

    require_once "../conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $area = $linha['area'];
    $carga_horaria = $linha['carga_horaria'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/formProdutos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <form action="salvarPostagem.php" method="POST">
            <p>Texto</p><input  type="text" name="texto">
            <p>Usuário que postou</p>
            <select name="idusuario">
            <?php
                require_once "conexao.php";

                $sql = "SELECT * FROM usuario";

                $resultados = mysqli_query($conexao, $sql);
                while ($linha = mysqli_fetch_array($resultados)) {
                    $idusuario = $linha['idusuario'];
                    $nome = $linha['nome'];
                    
                    echo "<option value='$idusuario'>$nome</option>";
                }
            ?>
        </select> <br> <br>

            <input type="submit" value="Salvar">
        </select>            
        </form>
    </div>
    <a href="index.php">Cancelar</a>
</body>

</html>