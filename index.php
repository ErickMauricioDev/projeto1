<?php
// Se a sessão ainda não estiver iniciada, inicia
if (!isset($_SESSION)) session_start();

include_once "topo.php";
include_once "menu.php";

// 🔹 Definir página padrão caso não tenha query string
if (empty($_SERVER["QUERY_STRING"])) {
    $_GET['pg'] = 'clientes'; 
}

// 🔹 Incluir a página correta
if (!empty($_GET['pg'])) {
    $pg = $_GET['pg'];
    
    $arquivo_raiz  = __DIR__ . "/$pg.php";       // verifica raiz
    $arquivo_admin = __DIR__ . "/admin/$pg.php"; // verifica pasta admin

    if (file_exists($arquivo_raiz)) {
        include_once $arquivo_raiz;
    } elseif (file_exists($arquivo_admin)) {
        include_once $arquivo_admin;
    } else {
        echo "<p>Página '$pg' não encontrada!</p>";
    }
} else {
    include_once "clientes.php"; // página padrão
}

include_once "rodape.php";
?>

<!-- Botão Área Admin / Modal -->
<?php
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
if (!$isAdmin):
?>
<button id="openAdmin" style="position:fixed; bottom:20px; right:20px; background:#0b74da; color:#fff; padding:10px 14px; border-radius:8px; border:none; cursor:pointer;">Área Admin</button>
<?php endif; ?>

<!-- Modal de login administrativo -->
<div id="loginBackdrop" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center; z-index:1000;">
  <div style="background:#fff; padding:20px; border-radius:10px; width:320px;">
    <span id="closeModal" style="float:right; cursor:pointer; font-weight:bold;">×</span>
    <h3>Login Administrativo</h3>
    <?php if(isset($_SESSION['login_error'])): ?>
        <p style="color:#c0392b;"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
    <?php endif; ?>
    <form action="admin/login.php" method="post">
      <input name="username" placeholder="Usuário" required style="width:100%; padding:8px; margin:8px 0;">
      <input name="password" type="password" placeholder="Senha" required style="width:100%; padding:8px; margin:8px 0;">
      <div style="display:flex; gap:8px; justify-content:flex-end; margin-top:8px;">
        <button type="button" id="cancelBtn">Cancelar</button>
        <button type="submit">Entrar</button>
      </div>
    </form>
  </div>
</div>

<script>
const openBtn = document.getElementById('openAdmin');
const backdrop = document.getElementById('loginBackdrop');
const closeModal = document.getElementById('closeModal');
const cancelBtn = document.getElementById('cancelBtn');

openBtn?.addEventListener('click', () => backdrop.style.display='flex');
closeModal?.addEventListener('click', () => backdrop.style.display='none');
cancelBtn?.addEventListener('click', () => backdrop.style.display='none');
</script>
