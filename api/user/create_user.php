<?php


session_set_cookie_params(0, '/', '.realmsofmiddle-earth.com');
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/utils/__ALL__.php";


if (isset($_POST['dob']) && !is_null($_POST['dob'])) { $dob = $_POST['dob']; }
else { new DeathError("/signup", "Date of birth not set."); }

if (isset($_POST['email']) && !is_null($_POST['email'])) { $email = $_POST['email']; }
else { new DeathError("/signup", "Email not set."); }

if (isset($_POST['confirmemail']) && !is_null($_POST['confirmemail'])) { $email2 = $_POST['confirmemail']; }
// else { new DeathError("/signup", "Confirmation email not set."); }

if (isset($_POST['password']) && !is_null($_POST['password'])) { $password = $_POST['password']; }
else { new DeathError("/signup", "Password not set."); }

if (isset($_POST['confirmpassword']) && !is_null($_POST['confirmpassword'])) { $password2 = $_POST['confirmpassword']; }
// else { new DeathError("/signup", "Confirmation password not set."); }

if (isset($_POST['terms']) && !is_null($_POST['terms'])) { $terms = $_POST['terms']; }
else { new DeathError("/signup", "Terms agreement not set."); }

if (isset($_POST['privacy']) && !is_null($_POST['privacy'])) { $privacy = $_POST['privacy']; }
else { new DeathError("/signup", "Privacy agreement not set."); }

if (isset($_POST['cookies']) && !is_null($_POST['cookies'])) { $cookies = $_POST['cookies']; }
else { new DeathError("/signup", "Cookies agreement not set."); }


// Run the checks
if (isset($_POST['confirmemail']) && !is_null($_POST['confirmemail']) && $email != $email2) {
    new DeathError("/signup", "Emails don't match.");
}
if (isset($_POST['confirmpassword']) && !is_null($_POST['confirmpassword']) && $password != $password2) {
    new DeathError("/signup", "Passwords don't match.");
}
if ($terms === false) {
    new DeathError("/signup", "Need to accept terms.");
}
if ($privacy === false) {
    new DeathError("/signup", "Need to accept privacy.");
}
if ($cookies === false) {
    new DeathError("/signup", "Need to accept cookies.");
}


// Store new user WEW
$database = get_database();
$statement = $database->prepare("INSERT INTO user_logins (email, password, date_of_birth) VALUES (:email, :password, :dob);");
try {
    $params = [
        ":email" => $email,
        ":password" => password_hash($password, PASSWORD_DEFAULT),
        ":dob" => $dob
    ];
    if(!$statement->execute($params)) {
        $error = $statement->errorInfo();
        // Check if error says primary key
        if (strpos($error, "PRIMARY") !== false) {
            new DeathError("/signup", "Email already exists.");
        }
        else {
            new DeathError("/signup", $error);
        }
    }
}
catch (PDOException $e) {
    new DeathError("/signup", $e->getMessage());
}


// All done, now redirect to create character
echo '<form id="created_form" action="create_character.php" method="post">';
foreach ($_POST as $a => $b) {
    echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
}
echo '<noscript><input type="submit" value="Click here if you are not redirected."/></noscript>orm>
<script type="text/javascript">
    document.getElementById(\'created_form\').submit();
</script>';


?>
