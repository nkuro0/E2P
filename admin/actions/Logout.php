<?php
session_start();

    // Détruit toutes les variables de session
    $_SESSION = array();

// Finalement, on détruit la session.
    session_destroy();
    header('location: ../logadmin.html');

?>