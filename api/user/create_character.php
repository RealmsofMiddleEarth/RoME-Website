<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/__ALL__.php";


if (isset($_POST['email']) && !is_null($_POST['email'])) { $email = $_POST['email']; }
else { new DeathError("Email not set."); }

if (isset($_POST['fname']) && !is_null($_POST['fname'])) { $first_name = $_POST['fname']; }
else { new DeathError("Forename not set."); }

if (isset($_POST['lname']) && !is_null($_POST['lname'])) { $last_name = $_POST['lname']; }
else { new DeathError("Surname not set."); }

if (isset($_POST['race']) && !is_null($_POST['race'])) { $race = $_POST['race']; }
else { new DeathError("Race not set."); }

if (isset($_POST['character_age']) && !is_null($_POST['character_age'])) { $age = (int) $_POST['character_age']; }
else { new DeathError("Character age not set."); }

if (isset($_POST['gender']) && !is_null($_POST['gender'])) { $gender = $_POST['gender']; }
else { new DeathError("Gender not set."); }


$database = get_database();
$statement = $database->prepare("INSERT INTO characters (email, forename, surname, age, gender, race) VALUES (?, ?, ?, ?, ?, ?);");
try {
    $params = [$email, $first_name, $last_name, $age, $gender, $race];
    if(!$statement->execute($params)) {
        $error = $statement->errorInfo();
        if (strpos($error, "PRIMARY") !== false) {
            new DeathError("Character already exists.");
        }
        else {
            new DeathError($error);
        }
    }
}
catch (PDOException $e) {
    new DeathError($e->getMessage());
}
die(json_encode([
    "error" => null,
    "email" => $email, 
    "first_name" => $first_name, 
    "last_name" => $last_name, 
    "age" => $age, 
    "gender" => $gender, 
    "race" => $race
]));


?>
