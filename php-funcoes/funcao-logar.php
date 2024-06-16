<?php
    session_start();//Inicia uma nova sessão ou resume uma sessão existente
    
    include ("conexao.php");

    $email=$_POST['email'];//obtém o login digitado
    $senha=$_POST['senha'];//obtém a senha digitada
    
    //verificação para ver se login e senha estão corretos
    $tenta_achar = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'" ;
    $resultado = $conexao->query($tenta_achar);
    if ($resultado->num_rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location:../crud.php');//redireciona para a página de acesso
    }
    else{
        session_unset();//remove todas as variáveis de sessão
        session_destroy();//destrói a sessão
        echo "<script> 
                alert('Login ou senha incorreto');
                window.location.href = 'login.php';
            </script>";
    }

?>