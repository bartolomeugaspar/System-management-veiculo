<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Veículo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Veículo</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=vehicles&store" method="post">
            <label for="plate">Placa:</label>
            <input type="text" id="plate" name="plate" required>
            <label for="brand">Marca:</label>
            <input type="text" id="brand" name="brand" required>
            <label for="model">Modelo:</label>
            <input type="text" id="model" name="model" required>
            <label for="year">Ano:</label>
            <input type="number" id="year" name="year" required>
            <label for="color">Cor:</label>
            <input type="text" id="color" name="color">
            <label for="owner_id">Proprietário:</label>
            <select id="owner_id" name="owner_id" required>
                <?php foreach ($owners as $owner): ?>
                    <option value="<?php echo $owner['id']; ?>"><?php echo $owner['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>