<?php
    require_once ('MVC/dao/PessoaDAO.php');

    $pessoaDao = new PessoaDAO();
    $lista = $pessoaDao->getLista(0, 999);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto MVC</title>

    <link rel="stylesheet" href="src/exemplo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <h1>Projeto MVC</h1>
        <div class="menu">
            <a href="index.php">Cadastro de Pessoas</a>
            <Pessoas href="lista.php"> Lista de Pessoas Cadastradas</a>
        </div>

        <h2>Pessoas Cadastradas</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>TELEFONE</th>
                    <th>AÇÕES</th>
                </tr>
                <?php while ($linha = $lista->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>
                        <td><?php echo $linha['id'] ?></td>
                        <td><?php echo $linha['nome'] ?></td>
                        <td><?php echo $linha['email'] ?></td>
                        <td><?php echo $linha['datanascimento'] ?></td>
                        <td><?php echo $linha['telefone'] ?></td>
                        <td class="actions">
                            <button class="update">
                                <a href="/projeto/index.php?id=<?php echo $linha['id'] ?>">Editar</a>
                            </button>
                            <button data-id="<?php echo $linha['id']?>" class="delete">Excluir</button>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
    </div>
</body>

<script src="src/exemplo.js"></script>

</html>