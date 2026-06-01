<header class="navbar">
  <div class="search-wrap">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
    </svg>
    <input class="search-input" type="search" placeholder="Buscar memes…">
  </div>

  <div class="navbar-actions">

    <div class="avatar-btn" title="Perfil">
      <div class="avatar-placeholder">
        <?php  
       $nome = $_SESSION["nome"];
          echo "$nome";
        ?>
      </div>
    </div>

  </div>
</header>
