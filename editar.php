<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/criar-contato.css">
</head>
<body>
    <div class="container my-5">
        <h2>Editar Contato</h2>

        <?php
        include 'php-funcoes/conexao.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM contato WHERE id=$id";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $primeiro_nome = $row['primeiro_nome'];
                $sobrenome = $row['sobrenome'];
                $telefone = $row['telefone'];
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $primeiro_nome = $_POST['primeiro_nome'];
            $sobrenome = $_POST['sobrenome'];
            $telefone = $_POST['telefone'];

            $sql = "UPDATE contato SET primeiro_nome='$primeiro_nome', sobrenome='$sobrenome', telefone='$telefone' WHERE id=$id";

            if ($conexao->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>Contato atualizado com sucesso!</div>";
                header("Location: crud.php");
                exit;
            } else {
                echo "<div class='alert alert-danger' role='alert'>Erro: " . $sql . "<br>" . $conexao->error . "</div>";
            }
            $conexao->close();
        }
        ?>

        <form action="editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="primeiro_nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="<?php echo $primeiro_nome; ?>" required>
            </div>
            <div class="mb-3">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>" maxlength="15">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="crud.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

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
