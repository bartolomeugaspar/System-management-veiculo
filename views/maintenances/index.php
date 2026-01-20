<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Manutenções</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <h2>Gestão Veículos</h2>
            <nav>
                <a href="../index.php">Dashboard</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="../index.php?action=users">Utilizadores</a>
                    <a href="../index.php?action=owners">Proprietários</a>
                <?php endif; ?>
                <a href="../index.php?action=vehicles">Veículos</a>
                <a href="../index.php?action=schedules">Agendamentos</a>
                <a href="../index.php?action=maintenances" class="active">Manutenções</a>
                <a href="../index.php?action=alerts">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="../index.php?action=reports">Relatórios</a>
                <?php endif; ?>
                <a href="../index.php?action=logout">Logout</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <header>
                <h1>Registos de Manutenção</h1>
                <nav style="margin-top:1rem;">
                    <a href="create.php">Novo Registo</a>
                </nav>
            </header>
            <main>
        <table>
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Veículo</th>
                    <th>Tipo</th>
                    <th>Serviços</th>
                    <th>Peças</th>
                    <th>Quilometragem</th>
                    <th>Responsável</th>
                    <th>Custos</th>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <th>Ações</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($maintenances as $maintenance): ?>
                <tr>
                    <td><?php echo $maintenance['date_time']; ?></td>
                    <td><?php echo $maintenance['plate']; ?></td>
                    <td><?php echo $maintenance['type']; ?></td>
                    <td><?php echo $maintenance['services']; ?></td>
                    <td><?php echo $maintenance['parts']; ?></td>
                    <td><?php echo $maintenance['mileage']; ?></td>
                    <td><?php echo $maintenance['responsible']; ?></td>
                    <td><?php echo $maintenance['costs']; ?></td>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <td>
                            <a href="edit.php?id=<?php echo $maintenance['id']; ?>">Editar</a>
                            <a href="../index.php?action=maintenances&delete=<?php echo $maintenance['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>