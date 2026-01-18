<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Alertas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Alertas e Notificações</h1>
        <nav>
            <a href="../index.php">Voltar</a>
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