<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Veículos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Veículos</h1>
        <nav>
            <a href="../index.php">Voltar</a>
            <?php if ($_SESSION['level'] == 1): ?>
                <a href="create.php">Novo Veículo</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Proprietário</th>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <th>Ações</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['plate']; ?></td>
                    <td><?php echo $vehicle['brand']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['color']; ?></td>
                    <td><?php echo $vehicle['owner_name']; ?></td>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <td>
                            <a href="edit.php?id=<?php echo $vehicle['id']; ?>">Editar</a>
                            <a href="../index.php?action=vehicles&delete=<?php echo $vehicle['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>