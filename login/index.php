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
            <h1 class="welcome">Olá, seja bem-vindo</h1>
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
            <div class="div_erro">
            <?php
                if (isset($_GET['email']) && $_GET['email'] == 1) {
                    echo '<p >Preencha seu E-mail.</p>';
            }
                if (isset($_GET['senha']) && $_GET['senha'] == 2) {
                    echo '<p >Preencha sua senha.</p>';
                }
                else if (isset($_GET['erro']) && $_GET['erro'] == 3) {
                    echo '<p >E-mail ou senha incorretos.</p>';
            }
            ?>
            </div>
            <div id="cadastrar">
                <p>Não tem cadastro?
                    <a href="../paginas/cadastro/cadastro.php">Cadastre-se!</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>