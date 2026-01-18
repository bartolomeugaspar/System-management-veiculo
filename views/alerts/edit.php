<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Alerta</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Alerta</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=alerts&update&id=<?php echo $alert['id']; ?>" method="post">
            <label for="due_date">Data de Vencimento:</label>
            <input type="date" id="due_date" name="due_date" value="<?php echo $alert['due_date']; ?>" required>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>" <?php echo $vehicle['id'] == $alert['vehicle_id'] ? 'selected' : ''; ?>><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="action">Ação Necessária:</label>
            <textarea id="action" name="action" required><?php echo $alert['action']; ?></textarea>
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>" <?php echo $user['id'] == $alert['responsible_id'] ? 'selected' : ''; ?>><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="priority">Prioridade:</label>
            <select id="priority" name="priority" required>
                <option value="Alta" <?php echo $alert['priority'] == 'Alta' ? 'selected' : ''; ?>>Alta</option>
                <option value="Média" <?php echo $alert['priority'] == 'Média' ? 'selected' : ''; ?>>Média</option>
                <option value="Baixa" <?php echo $alert['priority'] == 'Baixa' ? 'selected' : ''; ?>>Baixa</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>