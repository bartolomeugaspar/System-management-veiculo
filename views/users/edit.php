<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Utilizador</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Utilizador</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=users&update&id=<?php echo $user['id']; ?>" method="post">
            <label for="username">Utilizador:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            <label for="level">Nível:</label>
            <select id="level" name="level" required>
                <option value="1" <?php echo $user['level'] == 1 ? 'selected' : ''; ?>>Administrador</option>
                <option value="2" <?php echo $user['level'] == 2 ? 'selected' : ''; ?>>Operador</option>
            </select>
            <label for="active">Ativo:</label>
            <input type="checkbox" id="active" name="active" <?php echo $user['active'] ? 'checked' : ''; ?>>
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>