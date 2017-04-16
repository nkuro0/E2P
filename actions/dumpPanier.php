<?php
session_start();
$_SESSION['panier'] = null;
header('location: ../index.php?page=panier');
?>