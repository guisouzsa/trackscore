<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome trackscore - Cadastro</title>
    <link rel="stylesheet" href="../../login/css/style.css" />
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
</head>
<body>
    <main id="container_geral">

        <section id="container_esquerdo">
            <img src="../../login/fotos/logo_login.png" alt="Logo" id="logo_login" />
            <h1 class="welcome">Bem-vindo! Crie sua conta aqui!</h1>
        </section>

        
        <section id="container_direito">
            <div id="logo">
                <img src="../../login/fotos/profile_icon.png" id="logo_profile" alt="Ícone de perfil" />
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
        <div class="div_erro">
            <?php
            if (isset($_GET['acessinvalid']) && $_GET['acessinvalid'] == 1) {
                echo '<p style="color:red;">Acesso inválido</p>';
            }
            if (isset($_GET['erro_campos']) && $_GET['erro_campos'] == 2) {
                echo '<p style="color:red;">Preencha todos os campos</p>';
            }
            if (isset($_GET['email']) && $_GET['email'] == 3) {
                echo '<p style="color:red;">E-mail inválido.</p>';
            }
            if (isset($_GET['emailcadastrado']) && $_GET['emailcadastrado'] == 4) {
                echo '<p style="color:red;">Este e-mail já está cadastrado</p>';
            }
            else if (isset($_GET['erro_banco']) && $_GET['erro_banco'] == 5) {
                echo '<p style="color:red;">Erro ao cadastrar usuário</p>';
            }
            ?>
        </div>
    </main>
</body>
</html>
