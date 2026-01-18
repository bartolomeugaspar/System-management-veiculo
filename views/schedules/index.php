<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Agendamentos de Manutenção</h1>
        <nav>
            <a href="../index.php">Voltar</a>
            <?php if ($_SESSION['level'] == 1): ?>
                <a href="create.php">Novo Agendamento</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Tipo</th>
                    <th>Veículo</th>
                    <th>Serviços</th>
                    <th>Responsável</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?php echo $schedule['date_time']; ?></td>
                    <td><?php echo $schedule['type']; ?></td>
                    <td><?php echo $schedule['plate']; ?></td>
                    <td><?php echo $schedule['services']; ?></td>
                    <td><?php echo $schedule['responsible']; ?></td>
                    <td><?php echo $schedule['status']; ?></td>
                    <td>
                        <?php if ($_SESSION['level'] == 1): ?>
                            <a href="edit.php?id=<?php echo $schedule['id']; ?>">Editar</a>
                            <a href="../index.php?action=schedules&delete=<?php echo $schedule['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                        <?php endif; ?>
                        <form action="../index.php?action=schedules&updateStatus&id=<?php echo $schedule['id']; ?>" method="post" style="display:inline;">
                            <select name="status">
                                <option value="Agendado" <?php echo $schedule['status'] == 'Agendado' ? 'selected' : ''; ?>>Agendado</option>
                                <option value="Em andamento" <?php echo $schedule['status'] == 'Em andamento' ? 'selected' : ''; ?>>Em andamento</option>
                                <option value="Concluído" <?php echo $schedule['status'] == 'Concluído' ? 'selected' : ''; ?>>Concluído</option>
                                <option value="Cancelado" <?php echo $schedule['status'] == 'Cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                <option value="Pendente" <?php echo $schedule['status'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
                            </select>
                            <button type="submit">Atualizar Status</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>