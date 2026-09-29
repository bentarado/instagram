<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border-style: solid;
            padding: 20px;
            border-radius: 5%;
        }
    </style>
</head>
<body>
    <h2>For You</h2>

    <table>
        <tr>
            <td>conteudo</td>
            <td>data e hora</td>
            <td>usuario</td>
            <td>ação</td>
            <!--<td>EDITAR</td>-->
        </tr>
        <?php
        require_once "conexao.php";
        
        $sql = "SELECT comentario.idcomentario, comentario.texto, comentario.data_hora, usuario.username
        FROM comentario
        INNER JOIN usuario
        ON comentario.idusuario = usuario.idusuario;";

        $resultados = mysqli_query($conexao, $sql);
        
        //quebra a variável $resultados em linhas (vetores/array)
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idcomentario'];
            $texto = $linha['texto'];
            $data_hora = $linha['data_hora'];
            $usuario = $linha['username'];

            echo "<tr>";
                echo "<td>$texto</td>";
                echo "<td>$data_hora</td>";
                echo "<td>$usuario</td>";
                echo "<td><a href='excluir_comentario.php?id=$id'>excluir</a></td>";
                //echo "<td><a href='cad_postagem.php?id=$id'>Editar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="menu.html">Início</a>
</body>
</html>