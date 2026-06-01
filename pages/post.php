<?php 
  session_start();
  
   if(!isset($_SESSION["email"]) && !isset($_SESSION["nome"]) ){
    header("location: login.php?Faça Login");
  }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Meme — MAWI</title>
  <link rel="stylesheet" href="../assets/styles/style.css">
  <style>
    .post-page-wrap {
      max-width: 560px;
      margin: 0 auto;
      padding: 24px 20px;
    }
    .post-page-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .post-page-title svg { width: 22px; height: 22px; color: var(--primary); }
    .form-group { margin-bottom: 16px; }
    .form-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--text-secondary);
      margin-bottom: 6px;
      letter-spacing: 0.3px;
      text-transform: uppercase;
    }
    .form-input {
      width: 100%;
      background: var(--bg-input);
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 11px 14px;
      font-size: 0.875rem;
      color: var(--text-primary);
      transition: var(--transition);
    }
    .form-input:focus {
      border-color: var(--primary);
      background: #fff;
      box-shadow: 0 0 0 3px var(--primary-glow-sm);
    }
    .form-input::placeholder { color: var(--text-muted); }
    .file-drop {
      border: 2px dashed var(--border);
      border-radius: var(--radius-md);
      padding: 40px 24px;
      text-align: center;
      background: var(--bg-input);
      cursor: pointer;
      transition: var(--transition);
    }
    .file-drop:hover, .file-drop.drag-over {
      border-color: var(--primary);
      background: var(--primary-lighter);
    }
    .file-drop svg { width: 36px; height: 36px; color: var(--primary-light); margin: 0 auto 12px; }
    .file-drop p { font-size: 0.85rem; color: var(--text-muted); }
    .file-drop p span { color: var(--primary); font-weight: 600; }
    .file-drop input[type="file"] {
      position: absolute;
      inset: 0;
      opacity: 0;
      cursor: pointer;
      width: 100%;
      height: 100%;
    }
    .file-drop-inner { position: relative; }
    .form-actions { display: flex; gap: 10px; align-items: center; margin-top: 20px; }
    .btn-cancel {
      padding: 10px 22px;
      border-radius: var(--radius-full);
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-secondary);
      background: var(--bg-input);
      border: 1.5px solid var(--border);
      transition: var(--transition);
    }
    .btn-cancel:hover { background: var(--bg-hover); color: var(--text-primary); }
    .preview-wrap { margin-top: 12px; display: none; }
    .preview-wrap img { border-radius: var(--radius-md); max-height: 300px; object-fit: contain; border: 1.5px solid var(--border); }
  </style>
</head>
<body>

<div class="layout">

  <?php include "./partials/sidebar.php"; ?>
  <?php include "./partials/header.php"; ?>

  <main class="feed">
    <div class="post-page-wrap">
      <div class="post-page-title">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
        Publicar um Meme
      </div>

      <div class="create-post-card" style="padding:24px">
        <form action="publicar.php" enctype="multipart/form-data" method="post">

          <div class="form-group">
            <label class="form-label">Imagem do meme</label>
            <div class="file-drop" id="fileDrop">
              <div class="file-drop-inner">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <p>Arraste o meme aqui ou <span>clique para escolher</span></p>

                <input type="file" name="arquivo" accept="image/*,image/gif" required id="fileInput">
              </div>
            </div>
            <div class="preview-wrap" id="previewWrap">
              <img id="previewImg" src="" alt="Preview">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="legenda">Legenda</label>
            <input class="form-input" type="text" id="legenda" name="legenda" placeholder="Escreve algo engraçado… (opcional)">
          </div>

          <div class="form-actions">
            <a href="home.php" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-publish">Publicar Meme</button>
          </div>

        </form>
      </div>

    </div>
  </main>



</div>

<script src="../assets/js/app.js"></script>
<script>
  const fileInput = document.getElementById('fileInput');
  const previewWrap = document.getElementById('previewWrap');
  const previewImg = document.getElementById('previewImg');
  const fileDrop = document.getElementById('fileDrop');

  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (!file) return;
    const url = URL.createObjectURL(file);
    previewImg.src = url;
    previewWrap.style.display = 'block';
  });

  ['dragenter','dragover'].forEach(e => fileDrop.addEventListener(e, ev => { ev.preventDefault(); fileDrop.classList.add('drag-over'); }));
  ['dragleave','drop'].forEach(e => fileDrop.addEventListener(e, () => fileDrop.classList.remove('drag-over')));
</script>

</body>
</html>
