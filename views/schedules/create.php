<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Novo Agendamento</h1>
        <nav><a href="index.php">Voltar</a></nav>
    </header>
    <main>
        <form action="../index.php?action=schedules&store" method="post">
            <label for="date_time">Data/Hora:</label>
            <input type="datetime-local" id="date_time" name="date_time" required>
            <label for="type">Tipo:</label>
            <select id="type" name="type" required>
                <option value="Preventiva">Preventiva</option>
                <option value="Corretiva">Corretiva</option>
            </select>
            <label for="vehicle_id">Veículo:</label>
            <select id="vehicle_id" name="vehicle_id" required>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['plate'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="services">Serviços:</label>
            <textarea id="services" name="services"></textarea>
            <label for="responsible_id">Responsável:</label>
            <select id="responsible_id" name="responsible_id">
                <option value="">Nenhum</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="observations">Observações:</label>
            <textarea id="observations" name="observations"></textarea>
            <button type="submit">Criar</button>
        </form>
    </main>
</body>
</html>