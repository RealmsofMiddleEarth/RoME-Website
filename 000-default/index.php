<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/__ALL__.php";


$page = new Page();

// Make column for content
$col = new Column();
$content = <<<CONTENT
<h2>Welcome to</h2>
<hr />
<h1>Realms of Middle Earth</h1>
<hr />
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
CONTENT;
$col->set_content($content);
$col->add_class("content");

// Add column to container and then body
$row = new Row();
$row->add_column($col);
$container = new Container();
$container->add_row($row);
$page->add_container($container);

$page->add_css_file("index");

echo $page->get_output();


?>
