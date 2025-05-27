<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome trackscore - Cadastro</title>
    <link rel="stylesheet" href="../login/css/style.css" />
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
</head>
<body>
    <main id="container_geral">

        <section id="container_esquerdo">
            <img src="../login/fotos/logo_login.png" alt="Logo" id="logo_login" />
            <h1 class="welcome">Create your account</h1>
        </section>

        <section id="container_direito">
            <div id="logo">
                <img src="../login/fotos/profile_icon.png" id="logo_profile" alt="Ícone de perfil" />
            </div>

            <form action="cadastrar_usuario.php" method="POST" id="form_php">
                <label for="InputNome" class="email_and_password">Nome</label>
                <input type="text" name="nome" id="InputNome" class="input_linhas" required />

                <label for="InputEmail" class="email_and_password">E-mail</label>
                <input type="email" name="email" id="InputEmail" class="input_linhas" required />

                <label for="InputPassword" class="email_and_password">Senha</label>
                <input type="password" name="senha" id="InputPassword" class="input_linhas" required />

                <div id="enviar_center">
                    <input type="submit" id="enviar" value="Cadastrar" />
                </div>
            </form>
        </section>

    </main>
</body>
</html>
