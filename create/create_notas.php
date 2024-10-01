<?php
include "../database/db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $data = $_POST['data_criacao'];
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO notas(fk_usuario, titulo, conteudo, data_criacao, categoria) VALUES ('$id_usuario', '$titulo', '$conteudo', '$data', '$categoria')";

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
    <title>Create Notas</title>
 </head>
 <body>
    
    <form method="POST" action="create_notas.php">
        Id do Usuario: <input type="number" name="id_usuario" required>
        Título: <input type="text" name="titulo" required>
        Conteudo: <input type="text" name="conteudo" required>
        Data de Criação: <input type="date" name="data_criacao" required>
        Categoria: <input type="text" name="categoria" required>
        <input type="Submit" name="create_notas" value="Adicionar">
    </form>
    <a href="../index.html"><button>Menu</button></a>
 </body>
 </html>