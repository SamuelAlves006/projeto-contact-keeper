<?php 
session_start(); // Inicia uma nova sessão ou resume uma sessão existente

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    session_unset(); // Remove todas as variáveis de sessão
    echo "<script>
        alert('Esta página só pode ser acessada por usuário logado');
        window.location.href = 'login.php';
    </script>";
}
$logado = $_SESSION['email'];
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ContactKeeper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/crud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-square-phone"></i>
                ContactKeeper
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="php-funcoes/logout.php">
                            <button class="btn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Sair
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container my-5">
            <h4 style="padding: 10px 0px 10px 0px; font-weight:400">Lista de contatos</h4>
            <a href="criar_contato.php" class="btn btn-success mb-3">Criar Novo Contato</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'php-funcoes/conexao.php';

                    function formatDDD($input) {
                        // Remove todos os caracteres que não são dígitos
                        $input = preg_replace('/\D/', '', $input);
                        
                        // Verifica se a string tem pelo menos dois dígitos
                        if (strlen($input) >= 2) {
                            // Formata os dois primeiros dígitos entre parênteses (para exibir como DDD)
                            $formatted = preg_replace('/^(\d{2})(.*)$/', '($1) $2', $input);
                            return $formatted;
                        }

                        // Se a string tiver menos de dois dígitos, retorna como está
                        return $input;
                    }

                    $sql_usuario = "SELECT id FROM usuario WHERE email = '$logado'";
                    $resultado_usuario = $conexao->query($sql_usuario);

                    if ($resultado_usuario->num_rows > 0) {
                        $row_usuario = $resultado_usuario->fetch_assoc();
                        $id_usuario = $row_usuario['id'];

                        $sql = "SELECT * FROM contato WHERE id_usuario = '$id_usuario'";
                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $formattedPhone = formatDDD($row["telefone"]);
                                echo "<tr>
                                    <td>" . $row["primeiro_nome"]. "</td>
                                    <td>" . $row["sobrenome"]. "</td>
                                    <td class='telefone'>" . $formattedPhone . "</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='editar.php?id=" . $row["id"] . "'>
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='php-funcoes/deletar.php?id=" . $row["id"] . "'>
                                            <i class='fa-solid fa-trash-can'></i>
                                        </a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Nenhum contato encontrado</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Erro: usuário não encontrado</td></tr>";
                    }
                    
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const telefones = document.querySelectorAll('.telefone');
            telefones.forEach(telefone => {
                let input = telefone.textContent;
                input = input.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                
                if (input.length === 10) { // Formato (XX) XXXXXXXX com hífen
                    input = '(' + input.slice(0, 2) + ') ' + input.slice(2, 6) + '-' + input.slice(6);
                } else if (input.length === 11) { // Formato (XX) XXXXXXXXX
                    input = '(' + input.slice(0, 2) + ') ' + input.slice(2);
                }

                telefone.textContent = input;
            });
        });
    </script>
</body>
</html>
