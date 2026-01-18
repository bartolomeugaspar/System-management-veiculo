<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Manutenções</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Registos de Manutenção</h1>
        <nav>
            <a href="../index.php">Voltar</a>
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