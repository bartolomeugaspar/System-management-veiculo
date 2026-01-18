<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Agendamento</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=schedules&update&id=<?php echo $schedule['id']; ?>" method="post">
            <label for="date_time">Data/Hora:</label>
            <input type="datetime-local" id="date_time" name="date_time" value="<?php echo date('Y-m-d\TH:i', strtotime($schedule['date_time'])); ?>" required>
            <label for="type">Tipo:</label>
            <select id="type" name="type" required>
                <option value="Preventiva" <?php echo $schedule['type'] == 'Preventiva' ? 'selected' : ''; ?>>Preventiva</option>
                <option value="Corretiva" <?php echo $schedule['type'] == 'Corretiva' ? 'selected' : ''; ?>>Corretiva</option>
            </select>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>" <?php echo $vehicle['id'] == $schedule['vehicle_id'] ? 'selected' : ''; ?>><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="services">Serviços:</label>
            <textarea id="services" name="services"><?php echo $schedule['services']; ?></textarea>
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>" <?php echo $user['id'] == $schedule['responsible_id'] ? 'selected' : ''; ?>><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Agendado" <?php echo $schedule['status'] == 'Agendado' ? 'selected' : ''; ?>>Agendado</option>
                <option value="Em andamento" <?php echo $schedule['status'] == 'Em andamento' ? 'selected' : ''; ?>>Em andamento</option>
                <option value="Concluído" <?php echo $schedule['status'] == 'Concluído' ? 'selected' : ''; ?>>Concluído</option>
                <option value="Cancelado" <?php echo $schedule['status'] == 'Cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                <option value="Pendente" <?php echo $schedule['status'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
            </select>
            <label for="observations">Observações:</label>
            <textarea id="observations" name="observations"><?php echo $schedule['observations']; ?></textarea>
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>