<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Proprietários</title>
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
                    <a href="../index.php?action=owners" class="active">Proprietários</a>
                <?php endif; ?>
                <a href="../index.php?action=vehicles">Veículos</a>
                <a href="../index.php?action=schedules">Agendamentos</a>
                <a href="../index.php?action=maintenances">Manutenções</a>
                <a href="../index.php?action=alerts">Alertas</a>
                <?php if ($_SESSION['level'] == 1): ?>
                    <a href="../index.php?action=reports">Relatórios</a>
                <?php endif; ?>
                <a href="../index.php?action=logout">Logout</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;flex-direction:column;min-height:100vh;">
            <header>
                <h1>Proprietários</h1>
                <nav style="margin-top:1rem;">
                    <a href="create.php">Novo Proprietário</a>
                </nav>
            </header>
            <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Contacto</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($owners as $owner): ?>
                <tr>
                    <td><?php echo $owner['name']; ?></td>
                    <td><?php echo $owner['address']; ?></td>
                    <td><?php echo $owner['contact']; ?></td>
                    <td><?php echo $owner['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $owner['id']; ?>">Editar</a>
                        <a href="../index.php?action=owners&delete=<?php echo $owner['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>