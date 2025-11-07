<?php
if (!isset($_SESSION)) session_start();

include_once "topo.php";
include_once "menu.php";

// Página padrão
$pg = !empty($_GET['pg']) ? basename($_GET['pg']) : 'home';

// Lista de páginas permitidas
$whitelist = [
    'home',
    'quemsomos',
    'produtos',
    'faleconosco',
    'form_fale_conosco',
    'clientes',
    'clientes_cadastrar',
    'clientes_editar',
    'clientes_excluir',
    'produtos_listar',
    'produtos_cadastrar',
    'produtos_editar',
    'produtos_excluir',
    'index'
];

// Verifica se está permitido
if (!in_array($pg, $whitelist, true)) {
    echo "<p style='color:red;'>Página não permitida.</p>";
} else {
    // Caminhos possíveis
    $caminhos = [
        __DIR__ . DIRECTORY_SEPARATOR . $pg . ".php",         // raiz
        __DIR__ . "/produtos1/" . $pg . ".php"                // dentro da pasta produtos1
    ];

    $encontrado = false;

    foreach ($caminhos as $arquivo) {
        if (file_exists($arquivo)) {
            include_once $arquivo;
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "<p style='color:red;'>Página '$pg' não encontrada!</p>";
    }
}

include_once "rodape.php";
?>

<?php
// Botão de acesso à área admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
if (!$isAdmin):
?>
<button id="openAdmin" style="
  position:fixed;
  bottom:20px;
  right:20px;
  background:#0b74da;
  color:#fff;
  padding:10px 14px;
  border-radius:8px;
  border:none;
  cursor:pointer;
  z-index:1001;
">
  Área Admin
</button>
<?php endif; ?>

<!-- Modal de login -->
<div id="loginBackdrop" style="
  display:none;
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.5);
  align-items:center;
  justify-content:center;
  z-index:1000;
">
  <div style="
    background:#fff;
    padding:20px;
    border-radius:10px;
    width:320px;
    box-shadow:0 6px 18px rgba(0,0,0,0.2);
  ">
    <span id="closeModal" style="float:right; cursor:pointer; font-weight:bold;">×</span>
    <h3>Login Administrativo</h3>
    <?php if(isset($_SESSION['login_error'])): ?>
      <p style="color:#c0392b;">
        <?= htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?>
      </p>
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
(function(){
  const openBtn = document.getElementById('openAdmin');
  const backdrop = document.getElementById('loginBackdrop');
  const closeModal = document.getElementById('closeModal');
  const cancelBtn = document.getElementById('cancelBtn');

  openBtn?.addEventListener('click', () => backdrop.style.display='flex');
  closeModal?.addEventListener('click', () => backdrop.style.display='none');
  cancelBtn?.addEventListener('click', () => backdrop.style.display='none');
  backdrop?.addEventListener('click', e => {
    if (e.target === backdrop) backdrop.style.display = 'none';
  });
})();
</script>
