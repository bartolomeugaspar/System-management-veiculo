<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Gestão de Veículos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <h2>Gestão Veículos</h2>
            <nav>
                <a href="#" class="active">Login</a>
            </nav>
        </aside>
        <div style="flex:1;display:flex;align-items:center;justify-content:center;min-height:100vh;">
            <div class="login-container">
                <h2>Login</h2>
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                <form action="login.php" method="post">
                    <label for="username">Utilizador:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>