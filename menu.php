<?php
?>
<style>
  /* Barra fija superior */
  nav {
    position: fixed;       /* fija la barra arriba */
    top: 0;
    left: 0;
    width: 100%;           /* ocupa todo el ancho */
    background: #111827;   /* negro moderno */
    padding: 14px 28px;
    display: flex;
    align-items: center;
    z-index: 1000;         /* siempre encima del contenido */
  }

  /* Enlaces */
  nav a {
    color: #f9fafb;
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
    margin-right: 22px;
    padding: 8px 12px;
    border-radius: 6px;
    transition: background 0.3s ease, color 0.3s ease;
  }

  nav a:hover {
    background: rgba(255,255,255,0.1);
    color: #ffffff;
  }

  .nav-right {
    margin-left: auto; /* empuja los enlaces de sesión a la derecha */
  }

  /* Ajuste para que el contenido no quede oculto detrás de la barra */
  body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
    background: #f3f4f6;
    padding-top: 60px; /* espacio igual a la altura de la barra */
  }
</style>

<nav>
  <a href="/gestion_eventos/index.php?route=events">Eventos</a>
  <a href="/gestion_eventos/index.php?route=locations">Ubicaciones</a>
  <a href="/gestion_eventos/index.php?route=contacts">Contactos</a>
  
  <div class="nav-right">
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="/gestion_eventos/index.php?route=logout">Cerrar sesión</a>
    <?php else: ?>
      <a href="/gestion_eventos/index.php?route=login_form">Iniciar sesión</a>
    <?php endif; ?>
  </div>
</nav>
