
<?php
    include '../database/db.php';
    $id = $_GET['id_notas'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $data_criacao = $_POST['data_criacao'];
        $categoria = $_POST['categoria'];
        $sql = "UPDATE notas SET titulo='$titulo', conteudo='$conteudo', data_criacao='$data_criacao', categoria='$categoria'  WHERE id_notas=$id";
        
        if ($conn -> query($sql) === TRUE){
            echo "Usuário atualizado com sucesso!";
            echo "<br>";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        }

    }

    $sql = "SELECT * FROM notas WHERE id_notas = '$id'";

    $result = $conn -> query($sql);

    $row = $result -> fetch_assoc(); 
?>
    

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualizar Nota</title>
    </head>
    <body>
        <form method="POST" action=" update_notas.php?id_notas=<?php echo $row['id_notas'];?>">
            <h1> Para atualizar os dados de sua nota, insira:</h1> <br>
            <label for="titulo">Novo título da nota:</label>
            <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required><br>
            <label for="conteudo">Novo conteudo da nota:</label>
            <input type="text" name="conteudo" value="<?php echo $row['conteudo']; ?>" required><br>
            <label for="data_criacao">Nova data de criação da nota:</label>
            <input type="date" name="data_criacao" value="<?php echo $row['data_criacao']; ?>" required><br>
            <label for="categoria">Nova categoria da nota:</label>
            <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" required><br>
            <input type="submit" value="Atualizar">
        </form>
    </body>
    <?php 
        $sql = "SELECT fk_usuario FROM notas WHERE id_notas = '$id'";

        $result = $conn -> query($sql);
    
        $row = $result -> fetch_assoc();
    ?>
    <a href='../read/read_notas.php?id_usuario=<?php echo $row['fk_usuario']?>'>Visualizar Notas</a> <?php
?>
</html>
