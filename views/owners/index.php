<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Proprietários</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Proprietários</h1>
        <nav>
            <a href="../index.php">Voltar</a>
            <a href="create.php">Novo Proprietário</a>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Contacto</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($owners as $owner): ?>
                <tr>
                    <td><?php echo $owner['name']; ?></td>
                    <td><?php echo $owner['address']; ?></td>
                    <td><?php echo $owner['contact']; ?></td>
                    <td><?php echo $owner['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $owner['id']; ?>">Editar</a>
                        <a href="../index.php?action=owners&delete=<?php echo $owner['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>