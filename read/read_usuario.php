<?php
    include '../database/db.php'; ?>

    <h2>Usuários</h2>

    <?php
    $sql = "SELECT * FROM usuario";

    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID </th>
                <th> Nome Completo </th>
                <th> Email </th>
                <th> Ações </th>
            </tr>";
        while($row = $result -> fetch_assoc()){ ?>
            <tr>
                <td> <?php echo $row['id_usuario'];?> </td>
                <td> <?php echo $row['nome'];?> </td>
                <td> <?php echo $row['email'];?> </td>
                <td> 
                    <a href='../read/read_notas.php?id_usuario=<?php echo $row['id_usuario']?>'>Ver notas</a> |
                    <a href='../update/update_usuario.php?id_usuario=<?php echo $row['id_usuario']?>'>Editar</a>|
                    <a href='../delete/delete_usuario.php?id_usuario=<?php echo $row['id_usuario']?>'>Excluir</a>
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
    <title>Usuários Registrados</title>
</head>
<body>
    <br>
    <a href="../index.html"> <button class = "menu"> Menu </button></a>
</body>
</html>