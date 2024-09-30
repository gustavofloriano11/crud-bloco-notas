<?php
include '../database/db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "INSERT INTO usuario (nome, email) values ('$name', '$email')";


        if($conn -> query($sql) === TRUE) {
            echo "Novo registro criado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn-> error;
        }
    }

    $conn -> close();
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Usuario</title>
</head>
<body>
    <h2>Usuario</h2>
    <form method="POST" action="create_usuario.php">
        Nome: <input type text name="nome" required>
        Email: <input type="text" name="email" required> 
        <input type="submit" name="create_usuario" value="Adicionar">
    </form>
</body>
</html>