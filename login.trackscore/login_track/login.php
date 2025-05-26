<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css">
    <title>Walcome trackscore</title>
</head>
<body>
    <main id="container_geral">
        <section id="container_esquerdo">
            <img src="fotos/logo_login.png" alt="Logo" id="logo_login">
            <h1 class="welcome">Hello, welcome!</h1>
        </section>

        <form action="logar.php" method="POST" id="container_direito">
            <img src="fotos/profile_icon.png"  id="logo_profile" alt="">
                <label for="email" class="email_and_password">E-mail</label>
                <input type="email" name="email" id="InputEmail" class="input_linhas" required>

                <label for="password" class="email_and_password">Password</label>
                <input type="password" name="senha" id="InputPassword" class="input_linhas" required>

                <input type="submit" id="enviar" value="Sign In">
        </form>
    </main>
</body>
</html>