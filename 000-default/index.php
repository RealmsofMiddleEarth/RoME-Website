<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/page.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/jumbotron.php";


$page = new Page();
$jumbotron = new Jumbotron();

$jumbotron->set_heading("Realms of Middle Earth");
$jumbotron->set_subheading("An online text-based roleplaying site");
$jumbotron->set_headertext("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.");

$page->set_jumbotron($jumbotron);
echo $page->get_output();


?>
