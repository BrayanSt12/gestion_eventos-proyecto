<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
      background: #f3f4f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 320px;
    }
    h1 {
      font-size: 22px;
      margin-bottom: 20px;
      text-align: center;
      color: #111827;
    }
    .error {
      color: red;
      margin-bottom: 12px;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      color: #374151;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 14px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #2563eb;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s ease;
    }
    button:hover {
      background: #1d4ed8;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h1>Iniciar sesión</h1>

    <?php if (!empty($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="/gestion_eventos/index.php?route=login">
      <label for="username">Usuario</label>
      <input type="text" name="username" id="username" required>

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" required>

      <button type="submit">Ingresar</button>
    </form>
  </div>
</body>
</html>
