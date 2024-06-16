<?php
    include("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $verificaCad = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexao->query($verificaCad);
    if ($resultado->num_rows > 0) {
        echo "<script>
                alert('Esse email já foi cadastrado. Utilize outro email.');
                window.location.href = '../cadastro.php';
            </script>";
    }

    else {
    
        $sql = "INSERT INTO usuario(nome, email, senha) 
                VALUES ('$nome', '$email', '$senha')";

        if (mysqli_query($conexao, $sql)) {
            echo "<script>
                    alert('Usuário cadastrado com sucesso!');
                    window.location.href = '../login.php';
                </script>";
        }

        else {
            echo "Erro no cadastro ".mysqli_connect_error($conexao);
        }

    }

    mysqli_close($conexao);
?>