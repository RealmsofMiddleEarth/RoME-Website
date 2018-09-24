<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/page.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/jumbotron.php";


$page = new Page();
// $jumbotron = new Jumbotron();

// $jumbotron->set_heading("Realms of Middle Earth");
// $jumbotron->set_subheading("An online text-based roleplaying site");
// $jumbotron->set_headertext("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.");

// $page->set_jumbotron($jumbotron);

$page->body->set_raw_html("<h2>Welcome to</h2>\n<hr />\n<h1>Realms of Middle Earth</h1>\n<hr />\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>");
$page->add_css_file("index");

echo $page->get_output();


?>
