<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Proprietário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Proprietário</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=owners&update&id=<?php echo $owner['id']; ?>" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo $owner['name']; ?>" required>
            <label for="address">Endereço:</label>
            <textarea id="address" name="address"><?php echo $owner['address']; ?></textarea>
            <label for="contact">Contacto:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $owner['contact']; ?>">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $owner['email']; ?>">
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>