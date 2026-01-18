<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Registo de Manutenção</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Registo de Manutenção</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=maintenances&store" method="post">
            <label for="date_time">Data/Hora:</label>
            <input type="datetime-local" id="date_time" name="date_time" required>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="type">Tipo:</label>
            <input type="text" id="type" name="type" required>
            <label for="services">Serviços:</label>
            <textarea id="services" name="services"></textarea>
            <label for="parts">Peças Substituídas:</label>
            <textarea id="parts" name="parts"></textarea>
            <label for="mileage">Quilometragem:</label>
            <input type="number" id="mileage" name="mileage">
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="costs">Custos:</label>
            <input type="number" step="0.01" id="costs" name="costs">
            <label for="observations">Observações:</label>
            <textarea id="observations" name="observations"></textarea>
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>