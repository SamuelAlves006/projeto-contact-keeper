<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contato WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Contato deletado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erro: " . $sql . "<br>" . $conexao->error . "</div>";
    }
}

$conexao->close();
header("Location: ../crud.php");
exit;
?>
