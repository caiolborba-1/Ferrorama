
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

<<<<<<< HEAD
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../index.php");
=======
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['login_erro'] = 'Você precisa estar logado para acessar esta página.';

    header('Location: ../index.php');
>>>>>>> 59a49919b9ab74e3795d4629b65abedc626aabee
    exit();
}
