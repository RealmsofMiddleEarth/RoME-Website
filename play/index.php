<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/display/__ALL__.php";


$page = new Page();

// Make column for content
$col = new Column();
$content = <<<CONTENT
CONTENT;
$col->set_content($content);
$col->add_class("content");

// Add column to container and then body
$row = new Row();
$row->add_column($col);
$container = new Container();
$container->add_row($row);
$page->add_container($container);

$page->add_css_file("play/index");

echo $page->get_output();


?>
