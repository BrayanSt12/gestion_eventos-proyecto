<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar ubicación</title>
  <link rel="stylesheet" href="/gestion_eventos/views/layout/style.css">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f9fafb; }
    header {
      background: #f3f4f6; padding: 14px 24px; color: #374151;
      display: flex; justify-content: flex-end; align-items: center;
      border-bottom: 1px solid #d1d5db;
    }
    header a {
      background:#dc2626; color:#fff; padding:8px 12px;
      border:1px solid #b91c1c; border-radius:6px;
      text-decoration:none; font-weight:600;
    }
    header a:hover { background:#b91c1c; }
    main { padding:20px; }
    h1 { color:#333; text-align:center; }
    .form-container {
      background:#fff; padding:20px; border-radius:12px;
      box-shadow:0 4px 12px rgba(0,0,0,0.1);
      max-width:600px; margin:auto;
    }
    label { display:block; margin-top:12px; font-weight:bold; color:#374151; }
    input {
      width:100%; padding:10px; margin-top:4px;
      border:1px solid #ccc; border-radius:6px;
    }
    button {
      margin-top:20px; background:#2563eb; color:#fff;
      padding:10px 16px; border:none; border-radius:6px;
      cursor:pointer; font-weight:600;
    }
    button:hover { background:#1d4ed8; }
  </style>
</head>
<body>
  <header>
    <a href="/gestion_eventos/index.php?route=logout">Cerrar sesión</a>
  </header>

  <main>
    <h1>Editar ubicación</h1>
    <div class="form-container">
      <form method="POST" action="/gestion_eventos/update_location">
        <input type="hidden" name="id" value="<?= $location['id'] ?>">

        <label>Título:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($location['title']) ?>" required>

        <label>Dirección:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($location['address']) ?>">

        <label>Latitud:</label>
        <input type="text" name="latitude" value="<?= htmlspecialchars($location['latitude']) ?>">

        <label>Longitud:</label>
        <input type="text" name="longitude" value="<?= htmlspecialchars($location['longitude']) ?>">

        <button type="submit">Actualizar ubicación</button>
      </form>
    </div>
  </main>
</body>
</html>
