<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar nueva ubicación</title>
  <style>
    .container {
      max-width: 700px;
      margin: 30px auto;
      background: #fff;
      border: 1px solid #d0d7de;
      border-radius: 6px;
      padding: 20px;
    }
    h1 { font-size: 22px; margin-bottom: 20px; color: #24292f; }
    label { display: block; font-weight: 600; margin-top: 12px; }
    input {
      width: 100%; padding: 8px; margin-top: 6px;
      border: 1px solid #d0d7de; border-radius: 6px; background: #f6f8fa;
    }
    button {
      margin-top: 20px; background: #2ea44f; color: #fff; border: none;
      padding: 10px 16px; border-radius: 6px; font-weight: 600; cursor: pointer;
    }
    button:hover { background: #2c974b; }
  </style>
</head>
<body>
  <?php include __DIR__ . '/../layout/menu.php'; ?>
  <div class="container">
    <h1>Registrar nueva ubicación</h1>
    <form method="post" action="/gestion_eventos/index.php?route=store_location">
      <label for="title">Título</label>
      <input type="text" name="title" id="title" required>

      <label for="address">Dirección</label>
      <input type="text" name="address" id="address" required>

      <label for="latitude">Latitud</label>
      <input type="text" name="latitude" id="latitude">

      <label for="longitude">Longitud</label>
      <input type="text" name="longitude" id="longitude">

      <button type="submit">Guardar ubicación</button>
    </form>
  </div>
</body>
</html>
