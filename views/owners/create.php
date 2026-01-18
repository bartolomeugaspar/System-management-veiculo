<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Proprietário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Proprietário</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=owners&store" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            <label for="address">Endereço:</label>
            <textarea id="address" name="address"></textarea>
            <label for="contact">Contacto:</label>
            <input type="text" id="contact" name="contact">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>