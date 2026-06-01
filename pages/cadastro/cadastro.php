<?php
  session_start();
  if(isset($_SESSION["email"])){
    header("location: ../pages/login.php?erro");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mawi</title>
    <link rel="stylesheet" href="../../assets/styles/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

  <h1>Criar Conta</h1>
  <p style="text-align: center; margin: 10px 0px 20px;">Crie a sua conta para começar a utlizar <br> a plataforma</p>
  <div class="container">

      <form action="../cadastro/validation.php" method="post">
          <div class="form-grupo">
            <label for="Nome">Nome</label>
            <input type="text" name="nome" required>
          </div>


          <div class="form-grupo">
            <label for="email">E-mail</label>
            <input type="email" name="email" required>
          </div>
          
          <div class="form-grupo">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="password" required>
            <button type="submit">Criar conta</button>
          </div>
        </form>

        <div style="display: flex; align-items: center; justify-content: center;">
          <span>Já tem uma conta? <a href="../../pages/login.php">Entrar</a></span>
        </div>
      </div>
</body>
</html>