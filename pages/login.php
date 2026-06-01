<?php
   if(isset($_SESSION["email"]) && isset($_SESSION["nome"]) ){
    header("location: home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/styles/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Mawi | Login</title>
</head>
<body>
    <div class="logo">
    <div class="logo-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 12l2 2 4-4"/>
        <circle cx="12" cy="12" r="10"/>
        <path d="M7 8h2m6 0h2M7 16h10"/>
      </svg>
    </div>

    <div class="logo-text">
      <h1>MAWI</h1>
    </div>
  </div>
  <br>

  <div class="container">
    <h1 style="text-align: center;">Entrar</h1>
    <form action="validation.php" method="post">
      <div class="form-grupo">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-grupo">
        <input type="password" name="senha" id="" placeholder="Senha">
      </div>
      <button type="submit">Entrar</button>
      <br>
      <span>Não tenho uma conta? 
        <a href="../pages/cadastro/cadastro.php">Sign UP</a>
      </span>
    </form>
  </div>
</body>
</html>