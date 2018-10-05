<?php


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/__ALL__.php";


if (isset($_POST['email']) && !is_null($_POST['email'])) { $email = $_POST['email']; }
else { new DeathError("Email not set."); }

if (isset($_POST['fname']) && !is_null($_POST['fname'])) { $first_name = $_POST['fname']; }
else { new DeathError("Forename not set."); }

if (isset($_POST['lname']) && !is_null($_POST['lname'])) { $last_name = $_POST['lname']; }
else { new DeathError("Surname not set."); }

if (isset($_POST['race']) && !is_null($_POST['race'])) { $race = $_POST['race']; }
else { new DeathError("Race not set."); }

if (isset($_POST['character_age']) && !is_null($_POST['character_age'])) { $age = $_POST['character_age']; }
else { new DeathError("Character age not set."); }

if (isset($_POST['gender']) && !is_null($_POST['gender'])) { $gender = $_POST['gender']; }
else { new DeathError("Gender not set."); }


$database = get_database();
$statement = $database->prepare("INSERT INTO characters (email, forename, surname, age, gender, race) VALUES (?, ?, ?, ?, ?, ?);");
try {
    $statement->execute([$email, $first_name, $last_name, $age, $gender, $race]);
}
catch (PDOException $e) {
    new DeathError($e->getMessage());
}
die(json_encode([
    "error" => null
]));


?>
