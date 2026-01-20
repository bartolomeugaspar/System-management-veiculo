<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestão de Veículos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <h2>Gestão Veículos</h2>
            <nav>
                <a href="index.php" class="active">Dashboard</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=users">Utilizadores</a>
                    <a href="index.php?action=owners">Proprietários</a>
                <?php endif; ?>
                <a href="index.php?action=vehicles">Veículos</a>
                <a href="index.php?action=schedules">Agendamentos</a>
                <a href="index.php?action=maintenances">Manutenções</a>
                <a href="index.php?action=alerts">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=reports">Relatórios</a>
                <?php endif; ?>
                <a href="index.php?action=logout">Logout</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <header>
                <h1>Sistema de Gestão de Manutenção de Veículos</h1>
            </header>
            <main>
                <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
                <p>Nível: <?php echo $_SESSION['level'] == 1 ? 'Administrador' : 'Operador'; ?></p>
                <!-- Dashboard content -->
                <div class="dashboard">
                    <div class="card">
                        <h3>Veículos Cadastrados</h3>
                        <p><?php echo count($vehicles ?? []); ?></p>
                    </div>
                    <div class="card">
                        <h3>Agendamentos Pendentes</h3>
                        <p><?php echo count(array_filter($schedules ?? [], fn($s) => $s['status'] == 'Agendado')); ?></p>
                    </div>
                    <div class="card">
                <h3>Alertas Próximos</h3>
                <p><?php echo count($upcoming_alerts ?? []); ?></p>
            </div>
        </div>
    </main>
</body>
</html>