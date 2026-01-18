<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Registo de Manutenção</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Registo de Manutenção</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=maintenances&update&id=<?php echo $maintenance['id']; ?>" method="post">
            <label for="date_time">Data/Hora:</label>
            <input type="datetime-local" id="date_time" name="date_time" value="<?php echo date('Y-m-d\TH:i', strtotime($maintenance['date_time'])); ?>" required>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>" <?php echo $vehicle['id'] == $maintenance['vehicle_id'] ? 'selected' : ''; ?>><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="type">Tipo:</label>
            <input type="text" id="type" name="type" value="<?php echo $maintenance['type']; ?>" required>
            <label for="services">Serviços:</label>
            <textarea id="services" name="services"><?php echo $maintenance['services']; ?></textarea>
            <label for="parts">Peças Substituídas:</label>
            <textarea id="parts" name="parts"><?php echo $maintenance['parts']; ?></textarea>
            <label for="mileage">Quilometragem:</label>
            <input type="number" id="mileage" name="mileage" value="<?php echo $maintenance['mileage']; ?>">
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>" <?php echo $user['id'] == $maintenance['responsible_id'] ? 'selected' : ''; ?>><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="costs">Custos:</label>
            <input type="number" step="0.01" id="costs" name="costs" value="<?php echo $maintenance['costs']; ?>">
            <label for="observations">Observações:</label>
            <textarea id="observations" name="observations"><?php echo $maintenance['observations']; ?></textarea>
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>