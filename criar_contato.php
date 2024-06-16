<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/criar-contato.css">
</head>
<body>
    <div class="container my-5">
        <h2>Criar Novo Contato</h2>
        <form action="criar_contato.php" method="post">
            <div class="mb-3">
                <label for="primeiro_nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" required>
            </div>
            <div class="mb-3">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required maxlength="15">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="crud.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'php-funcoes/conexao.php';

            $logado = $_SESSION['email']; 
            $primeiro_nome = $_POST['primeiro_nome'];
            $sobrenome = $_POST['sobrenome'];
            $telefone = $_POST['telefone'];

            $sql_usuario = "SELECT id FROM usuario WHERE email = '$logado'";
            $resultado_usuario = $conexao->query($sql_usuario);

            if ($resultado_usuario->num_rows > 0) {
                $row_usuario = $resultado_usuario->fetch_assoc();
                $id_usuario = $row_usuario['id'];

                $sql = "INSERT INTO contato (primeiro_nome, sobrenome, telefone, id_usuario) VALUES ('$primeiro_nome', '$sobrenome', '$telefone', '$id_usuario')";
                if ($conexao->query($sql) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>Contato criado com sucesso!</div>";
                    header("Location: crud.php");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Erro: " . $sql . "<br>" . $conexao->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Erro: usuário não encontrado.</div>";
            }

            $conexao->close();
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('telefone').addEventListener('input', function (e) {
            let input = e.target.value;
            input = input.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            if (input.length > 0) {
                input = '(' + input;
            }
            if (input.length > 3) {
                input = input.slice(0, 3) + ') ' + input.slice(3);
            }
            if (input.length === 13) { // Formato (XX) XXXXXXXX com hífen
                input = input.slice(0, 9) + '-' + input.slice(9);
            }
            e.target.value = input;
        });
    </script>

</body>
</html>
