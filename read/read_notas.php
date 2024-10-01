<?php
    include '../database/db.php'; 

    $id_usuario = $_GET['id_usuario'];
    
    $sql = "SELECT nome FROM usuario WHERE id_usuario = '$id_usuario'";

    $result = $conn -> query($sql);

    $row = $result -> fetch_assoc()
    
    ?>

    <h2>Notas de <?php echo $row['nome'];?></h2>

    <?php

    $sql = "SELECT * FROM notas WHERE fk_usuario = '$id_usuario'";

    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID </th>
                <th> Título </th>
                <th> Conteúdo </th>
                <th> Categoria </th>
                <th> Data de Criação </th>
                <th> Ações </th>
            </tr>";
        while($row = $result -> fetch_assoc()){ ?>
            <tr>
                <td> <?php echo $row['id_notas'];?> </td>
                <td> <?php echo $row['titulo'];?> </td>
                <td> <?php echo $row['conteudo'];?> </td>
                <td> <?php echo $row['categoria'];?> </td>
                <td> <?php echo $row['data_criacao'];?> </td>
                <td> 
                    <a href='../update/update_notas.php?id_notas=<?php echo $row['id_notas']?>'>Editar</a> |
                    <a href='../delete/delete_notas.php?id_notas=<?php echo $row['id_notas']?>'>Excluir</a>
                </td>
            </tr>
<?php   }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado";
    }
    $conn -> close()
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Registrados</title>
</head>
<body>
    <br>
    <a href="../index.html"> <button class = "menu"> Menu </button></a>
</body>
</html>