<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Utilizadores</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Utilizadores</h1>
        <nav>
            <a href="../index.php">Voltar</a>
            <a href="create.php">Novo Utilizador</a>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilizador</th>
                    <th>Nível</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['level'] == 1 ? 'Admin' : 'Operador'; ?></td>
                    <td><?php echo $user['active'] ? 'Sim' : 'Não'; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $user['id']; ?>">Editar</a>
                        <a href="../index.php?action=users&delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>