<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Alertas</title>
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
                <a href="../index.php?action=maintenances">Manutenções</a>
                <a href="../index.php?action=alerts" class="active">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="../index.php?action=reports">Relatórios</a>
                <?php endif; ?>
                <a href="../index.php?action=logout">Logout</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <header>
                <h1>Alertas e Notificações</h1>
                <nav style="margin-top:1rem;">
                    <?php if ($_SESSION['level'] == 1): ?>
                        <a href="create.php">Novo Alerta</a>
                    <?php endif; ?>
                </nav>
            </header>
            <main>
        <table>
            <thead>
                <tr>
                    <th>Data de Vencimento</th>
                    <th>Veículo</th>
                    <th>Ação Necessária</th>
                    <th>Responsável</th>
                    <th>Prioridade</th>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <th>Ações</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alerts as $alert): ?>
                <tr>
                    <td><?php echo $alert['due_date']; ?></td>
                    <td><?php echo $alert['plate']; ?></td>
                    <td><?php echo $alert['action']; ?></td>
                    <td><?php echo $alert['responsible']; ?></td>
                    <td><?php echo $alert['priority']; ?></td>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <td>
                            <a href="edit.php?id=<?php echo $alert['id']; ?>">Editar</a>
                            <a href="../index.php?action=alerts&delete=<?php echo $alert['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>