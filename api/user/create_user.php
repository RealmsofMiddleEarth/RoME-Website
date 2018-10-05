<?php


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/__ALL__.php";


if (isset($_POST['dob']) && !is_null($_POST['dob'])) { $dob = $_POST['dob']; }
else { new DeathError("Date of birth not set."); }

if (isset($_POST['email']) && !is_null($_POST['email'])) { $email = $_POST['email']; }
else { new DeathError("Email not set."); }

if (isset($_POST['confirmemail']) && !is_null($_POST['confirmemail'])) { $email2 = $_POST['confirmemail']; }
else { new DeathError("Confirmation email not set."); }

if (isset($_POST['password']) && !is_null($_POST['password'])) { $password = $_POST['password']; }
else { new DeathError("Password not set."); }

if (isset($_POST['confirmpassword']) && !is_null($_POST['confirmpassword'])) { $password2 = $_POST['confirmpassword']; }
else { new DeathError("Confirmation password not set."); }

if (isset($_POST['terms']) && !is_null($_POST['terms'])) { $terms = $_POST['terms']; }
else { new DeathError("Terms agreement not set."); }

if (isset($_POST['privacy']) && !is_null($_POST['privacy'])) { $privacy = $_POST['privacy']; }
else { new DeathError("Privacy agreement not set."); }

if (isset($_POST['cookies']) && !is_null($_POST['cookies'])) { $cookies = $_POST['cookies']; }
else { new DeathError("Cookies agreement not set."); }



// Run the checks
if ($email != $email2) {
    new DeathError("Emails don't match.");
}
if ($password != $password2) {
    new DeathError("Passwords don't match.");
}
if ($terms === false) {
    new DeathError("Need to accept terms.");
}
if ($privacy === false) {
    new DeathError("Need to accept privacy.");
}
if ($cookies === false) {
    new DeathError("Need to accept cookies.");
}


// Store new user WEW
$database = get_database();
$statement = $database->prepare("INSERT INTO user_logins (email, password, date_of_birth) VALUES (:email, :password, :dob);");
try {
    $statement->execute([
        ":email" => $email,
        ":password" => password_hash($password, PASSWORD_DEFAULT),
        ":dob" => $dob
    ]);
}
catch (PDOException $e) {
    new DeathError($e->getMessage());
}
die(json_encode([
    "error" => null
]));


?>
