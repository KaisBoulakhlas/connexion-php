<?php
require_once 'Database.php';
require_once 'User.php';
require_once 'Authentication.php';


define('DB_NAME', 'contact');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

if (Authentication::isLoggedIn()) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['register'])) {
    $user = new User(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
    $user->save();
    header('Location: home.php');
    exit();
    
} elseif ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login'])) {
    if (Authentication::login(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']))) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: home.php');
        exit();
    } else {
        $error = 'Nom d\'utilisateur ou mot de passe invalide';
    }
}

$view = isset($_GET['view']) ? $_GET['view'] : 'register';

switch ($view) {
  case 'login':
    require_once('login.php');
    break;
  default:
    require_once('register.php');
    break;
}

?>