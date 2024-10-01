<?php
include "../database/db.php";

if($id_usuario = $_GET['id_usuario']){
    $sql = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
    if($conn -> query($sql)=== TRUE) {
        echo "Registro excluído.";
    } else {
        echo "Erro: " . $sql . "<br>". $conn -> error;
    }
    $conn -> close();
    header("Location: ../read/read_usuario.php");
    exit();
}

if($id_notas = $_GET['id_notas']){
    $sql = "DELETE FROM notas WHERE id_notas = '$id_notas'";
    if($conn -> query($sql)=== TRUE) {
        echo "Registro excluído.";
    } else {
        echo "Erro: " . $sql . "<br>". $conn -> error;
    }
    $conn -> close();
    header("Location: ../read/read_notas.php");
    exit();
}

?>