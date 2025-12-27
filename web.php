<?php
session_start();

// Conexión a la base de datos
require_once __DIR__ . '/../config/database.php';

// Verificación extra para evitar el error de $pdo null
if (!isset($pdo)) {
    die('Error: conexión PDO no inicializada. Revisa config/database.php');
}

// Controlador principal
$route = $_GET['route'] ?? 'inicio'; // por defecto ahora va a inicio

switch ($route) {
    // ------------------- INICIO -------------------
    case 'inicio':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        include __DIR__ . '/../views/inicio/index.php';
        break;

    // ------------------- EVENTOS -------------------
    case 'events':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        $stmt = $pdo->query("SELECT e.*, l.title AS location_title 
                             FROM events e 
                             LEFT JOIN locations l ON e.location_id = l.id");
        $events = $stmt->fetchAll();
        include __DIR__ . '/../views/events/index.php';
        break;

    case 'create_event':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        $locations = $pdo->query("SELECT * FROM locations")->fetchAll();
        include __DIR__ . '/../views/events/create.php';
        break;

    case 'store_event':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $pdo->prepare("INSERT INTO events (title, classification, start_at, end_at, description, location_id) 
                                   VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['title'],
                $_POST['classification'],
                $_POST['start_at'],
                $_POST['end_at'],
                $_POST['description'],
                $_POST['location_id']
            ]);
        }
        header("Location: index.php?route=events");
        break;

    case 'delete_event':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
            $stmt->execute([$_GET['id']]);
        }
        header("Location: index.php?route=events");
        break;

    // ------------------- UBICACIONES -------------------
    case 'locations':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        $locations = $pdo->query("SELECT * FROM locations")->fetchAll();
        include __DIR__ . '/../views/locations/index.php';
        break;

    case 'create_location':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        include __DIR__ . '/../views/locations/create.php';
        break;

    case 'store_location':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $pdo->prepare("INSERT INTO locations (title, address, latitude, longitude) 
                                   VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $_POST['title'],
                $_POST['address'],
                $_POST['latitude'],
                $_POST['longitude']
            ]);
        }
        header("Location: index.php?route=locations");
        break;

    case 'delete_location':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("DELETE FROM locations WHERE id = ?");
            $stmt->execute([$_GET['id']]);
        }
        header("Location: index.php?route=locations");
        break;

    // ------------------- CONTACTOS -------------------
    case 'contacts':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        $contacts = $pdo->query("SELECT * FROM contacts")->fetchAll();
        include __DIR__ . '/../views/contacts/index.php';
        break;

    case 'create_contact':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        include __DIR__ . '/../views/contacts/create.php';
        break;

    case 'store_contact':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $pdo->prepare("INSERT INTO contacts (full_name, email, phone) 
                                   VALUES (?, ?, ?)");
            $stmt->execute([
                $_POST['full_name'],
                $_POST['email'],
                $_POST['phone']
            ]);
        }
        header("Location: index.php?route=contacts");
        break;

    case 'delete_contact':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login_form");
            exit;
        }
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
            $stmt->execute([$_GET['id']]);
        }
        header("Location: index.php?route=contacts");
        break;

    // ------------------- LOGIN / LOGOUT -------------------
    case 'login_form':
        include __DIR__ . '/../views/auth/login.php';
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$_POST['username'], $_POST['password']]);
            $user = $stmt->fetch();

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php?route=inicio"); // redirige a inicio
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos";
                include __DIR__ . '/../views/auth/login.php';
            }
        }
        break;

    case 'logout':
        session_destroy();
        header("Location: index.php?route=login_form");
        break;

    default:
        header("Location: index.php?route=inicio");
        break;
}
