 <?php 
  session_start();
    require_once("../src/db.php");

  if(!isset($_SESSION["email"]) && !isset($_SESSION["nome"]) ){
    header("location: login.php?Faça Login");
  }
  
 

    $query = "SELECT memes.*, usuario.nome FROM memes JOIN usuario ON memes.id_usuario = usuario.id ORDER BY memes.id DESC;";

    $result = $pdo->query($query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAWI — Memes.</title>
  <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>

<div class="layout">

  <?php include "./partials/sidebar.php"; ?>
  <?php include "./partials/header.php"; ?>
  

  <main class="feed">

  <?php
      while($memes = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '
          <article class="post-card">
      <div class="post-header">
        <div class="post-avatar-placeholder" style="background:linear-gradient(135deg,#f43f5e,#1e40af)">' .  $memes["nome"]
          . '</div>
        <div class="post-meta">
          <div class="username">
            ' .  $memes["nome"]
          . '</div>
        </div>
      </div>
      <div class="post-image-wrap">
        <div class="meme-placeholder">
        <img src=" '. $memes["arquivo"] .'" width="300px">
        </div>
      </div>
      <p class="post-captio"> ' .$memes["legenda"] . ' <span class="hashtag">#IPDDF</span>
      </p>
    </article>
        ';
      }
   ?>

    <article class="post-card">
      <div class="post-header">
        <div class="post-avatar-placeholder" style="background:linear-gradient(135deg,#f43f5e,#fb923c)">KC</div>
        <div class="post-meta">
          <div class="username">
            Francisco Eduardo
          </div>
        </div>
      </div>
      <p class="post-caption">DDF em chamas <span class="hashtag">#IPDDF</span> <span class="hashtag">#rest in KC</span></p>
    </article>

    
    <article class="post-card">
      <div class="post-header">
        <div class="post-avatar-placeholder" style="background:linear-gradient(135deg,#10b981,#34d399)">HM</div>
        <div class="post-meta">
          <div class="username">Ti Pinzi</div>
        </div>
      </div>
      <p class="post-caption">É probulemaaa?? <span class="hashtag">#tipinzi</span></p>
      <div class="post-image-wrap">
        <div class="meme-placeholder" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe)">
          😩<span style="font-size:1rem;color:#1e40af;font-weight:600;font-family:'Poppins',sans-serif">Segunda</span>
        </div>
      </div>
    </article>

  </main>

</div>

<script src="../assets/js/app.js"></script>
</body>
</html>
