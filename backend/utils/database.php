<?php


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/_PASSWORDS.php";


function get_database() {
    $dsn = "mysql:host=" . $GLOBALS['database_config']['host'] . ";dbname=" . $GLOBALS['database_config']['database'] . ";";
    $user = $GLOBALS['database_config']['user'];
    $password = $GLOBALS['database_config']['password'];
    $options = array(
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    return new PDO($dsn, $user, $password, $options);
}


?>