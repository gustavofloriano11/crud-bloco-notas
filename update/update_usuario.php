<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualizar Usuário</title>
    </head>
    <body>
        <form method="POST" action=" update_usuario.php?id=<?php echo $row['id_usuario'];?>">
            <h1> Para atualizar os dados do usuário, insira:</h1> <br>
            <label for="nome">Novo nome do usuário:</label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
            <label for="email">Novo email do usuário:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
            <input type="submit" value="Atualizar">
        </form>
    </body>
</html>

<?php
    include '../database/db.php';
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE id_usuario=$id";

        if ($conn -> query($sql) === TRUE){
            echo "Usuário atualizado com sucesso!";
            echo "<br>";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        };
        echo "<a href='read_usuario.php'>Visualizar usuários</a>";
    };

    $sql = "SELECT * FROM usuario WHERE id_usuario='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>