<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestão de Veículos</title>
    <link rel="stylesheet" href="assets/css/tailwind.output.css">
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64 flex-shrink-0 flex flex-col px-4 py-6 fixed inset-y-0 z-30 md:static md:translate-x-0 transform -translate-x-full transition-transform duration-200 ease-in-out" id="sidebar">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-cyan-400 tracking-wide">Gestão Veículos</h2>
                <button class="md:hidden text-gray-400 hover:text-cyan-400" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <nav class="flex flex-col gap-2">
                <a href="index.php" class="py-2 px-3 rounded-lg transition bg-cyan-700/30 text-cyan-300 font-semibold">Dashboard</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=users" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Utilizadores</a>
                    <a href="index.php?action=owners" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Proprietários</a>
                <?php endif; ?>
                <a href="index.php?action=vehicles" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Veículos</a>
                <a href="index.php?action=schedules" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Agendamentos</a>
                <a href="index.php?action=maintenances" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Manutenções</a>
                <a href="index.php?action=alerts" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="index.php?action=reports" class="py-2 px-3 rounded-lg hover:bg-cyan-700/20 transition">Relatórios</a>
                <?php endif; ?>
                <a href="index.php?action=logout" class="py-2 px-3 rounded-lg hover:bg-red-700/20 transition">Logout</a>
            </nav>
        </aside>
        <!-- Main content -->
        <div class="flex-1 flex flex-col md:ml-64">
            <header class="flex items-center justify-between px-6 py-4 border-b border-gray-800 bg-gray-900 sticky top-0 z-10">
                <h1 class="text-2xl font-bold text-cyan-400">Sistema de Gestão de Manutenção de Veículos</h1>
                <button class="md:hidden text-gray-400 hover:text-cyan-400" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </header>
            <main class="flex-1 p-8">
                <h2 class="text-xl font-semibold mb-2">Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
                <p class="mb-6">Nível: <?php echo $_SESSION['level'] == 1 ? 'Administrador' : 'Operador'; ?></p>
                <!-- Dashboard content -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 dashboard">
                    <div class="card bg-gray-800 border border-cyan-700/30 shadow-lg p-6 rounded-xl flex flex-col items-center">
                        <h3 class="text-lg font-bold text-cyan-300 mb-2">Veículos Cadastrados</h3>
                        <p class="text-3xl font-extrabold text-cyan-400"><?php echo count($vehicles ?? []); ?></p>
                    </div>
                    <div class="card bg-gray-800 border border-cyan-700/30 shadow-lg p-6 rounded-xl flex flex-col items-center">
                        <h3 class="text-lg font-bold text-cyan-300 mb-2">Agendamentos Pendentes</h3>
                        <p class="text-3xl font-extrabold text-cyan-400"><?php echo count(array_filter($schedules ?? [], fn($s) => $s['status'] == 'Agendado')); ?></p>
                    </div>
                    <div class="card bg-gray-800 border border-cyan-700/30 shadow-lg p-6 rounded-xl flex flex-col items-center">
                <h3>Alertas Próximos</h3>
                <p><?php echo count($upcoming_alerts ?? []); ?></p>
            </div>
        </div>
    </main>
</body>
</html>