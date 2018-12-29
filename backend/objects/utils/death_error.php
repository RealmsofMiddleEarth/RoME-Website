<?php


class DeathError {
    function __construct($redirect, $error) {
        $_SESSION['error'] = $error;
        header("Location: https://realmsofmiddle-earth.com{$redirect}");
    }
}


?>
