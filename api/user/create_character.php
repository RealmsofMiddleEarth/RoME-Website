<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_set_cookie_params(0, '/', '.realmsofmiddle-earth.com');
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/__ALL__.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/user_datatypes/character.php";


if (isset($_POST['email']) && !is_null($_POST['email'])) { $email = $_POST['email']; }
else { new DeathError("/signup", "Email not set."); }

if (isset($_POST['fname']) && !is_null($_POST['fname'])) { $first_name = $_POST['fname']; }
else { new DeathError("/signup", "Forename not set."); }

if (isset($_POST['lname']) && !is_null($_POST['lname'])) { $last_name = $_POST['lname']; }
else { new DeathError("/signup", "Surname not set."); }

if (isset($_POST['race']) && !is_null($_POST['race'])) { $race = $_POST['race']; }
else { new DeathError("/signup", "Race not set."); }

if (isset($_POST['character_age']) && !is_null($_POST['character_age'])) { $age = (int) $_POST['character_age']; }
else { new DeathError("/signup", "Character age not set."); }

if (isset($_POST['gender']) && !is_null($_POST['gender'])) { $gender = $_POST['gender']; }
else { new DeathError("/signup", "Gender not set."); }


$database = get_database();
$statement = $database->prepare("INSERT INTO characters (email, forename, surname, age, gender, race) VALUES (?, ?, ?, ?, ?, ?);");
try {
    $params = [$email, $first_name, $last_name, $age, $gender, $race];
    if(!$statement->execute($params)) {
        $error = $statement->errorInfo();
        // Check if error says primary key
        if (strpos($error, "PRIMARY") !== false) {
            new DeathError("/signup", "Character already exists.");
        }
        else {
            new DeathError("/signup", $error);
        }
    }
}
catch (PDOException $e) {
    new DeathError("/signup", $e->getMessage());
}


// S'all good, add them to the session data
$_SESSION['current_user'] = new Character(
    $email,
    $first_name,
    $last_name,
    $age,
    $gender,
    $race,
    0, 0, 0, null
);

// And redirect to main site
header("Location: https://play.realmsofmiddle-earth.com/")


?>
