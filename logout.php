<?php
session_start();
unset($_SESSION['client_session']);
header('Location: index.php');
?>