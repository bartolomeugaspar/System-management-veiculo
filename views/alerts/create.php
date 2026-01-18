<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Alerta</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Alerta</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=alerts&store" method="post">
            <label for="due_date">Data de Vencimento:</label>
            <input type="date" id="due_date" name="due_date" required>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="action">Ação Necessária:</label>
            <textarea id="action" name="action" required></textarea>
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="priority">Prioridade:</label>
            <select id="priority" name="priority" required>
                <option value="Alta">Alta</option>
                <option value="Média">Média</option>
                <option value="Baixa">Baixa</option>
            </select>
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>