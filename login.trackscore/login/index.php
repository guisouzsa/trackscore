<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Walcome trackscore</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
</head>
<body>
    <main id="container_geral">

        <section id="container_esquerdo">
            <img src="fotos/logo_login.png" alt="Logo" id="logo_login" />
            <h1 class="welcome">Hello, welcome back!</h1>
        </section>


        <section id="container_direito">
            <div id="logo">
                <img src="fotos/profile_icon.png" id="logo_profile" alt="Ícone de perfil" />
            </div>

            <form action="logar.php" method="POST" id="form_php">
                <label for="InputEmail" class="email_and_password">E-mail</label>
                <input type="email" name="email" id="InputEmail" class="input_linhas" required />

                <label for="InputPassword" class="email_and_password">Password</label>
                <input type="password" name="senha" id="InputPassword" class="input_linhas" required />

                <div id="enviar_center">
                    <input type="submit" id="enviar" value="Sign In" />
                </div>
            </form>
            <div>
                oi bb
            </div>
        </section>

    </main>
</body>
</html>