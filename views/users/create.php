<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Utilizador</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Utilizador</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=users&store" method="post">
            <label for="username">Utilizador:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="level">Nível:</label>
            <select id="level" name="level" required>
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
            </select>
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>