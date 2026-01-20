<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatórios</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <h2>Gestão Veículos</h2>
            <nav>
                <a href="index.php">Dashboard</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=users">Utilizadores</a>
                    <a href="index.php?action=owners">Proprietários</a>
                <?php endif; ?>
                <a href="index.php?action=vehicles">Veículos</a>
                <a href="index.php?action=schedules">Agendamentos</a>
                <a href="index.php?action=maintenances">Manutenções</a>
                <a href="index.php?action=alerts">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=reports" class="active">Relatórios</a>
                <?php endif; ?>
                <a href="index.php?action=logout">Logout</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <header>
                <h1>Relatórios e Análises</h1>
            </header>
            <main>
                <h2>Custos Totais de Manutenção</h2>
                <p>Total: €<?php echo number_format($total_costs, 2); ?></p>
                <!-- Add more reports as needed -->
            </main>
        </div>
    </div>
</body>
</html>