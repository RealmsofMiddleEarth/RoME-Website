<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/display/__ALL__.php";


$page = new Page();

// Make column for content
$col = new Column();
$content = <<<CONTENT
<h2>Welcome to</h2>
<hr />
<!-- <h1>Realms of Middle Earth</h1> -->
<img src="/static/images/branding/full.png" />
<hr />
<h2>An online text-based roleplaying site</h2>
<hr />
<p>In the year 3501 of the New First Age, within the United Kingdoms of Middle Earth reside the Lordships of each race; the men, based in the White City of Gondor, the elves, hidden in the beautiful region of Rivendell, the dwarves, fortified within their kingdom under the mountain in Erebor, and the hobbits, within their peaceful borders of the Shire. Whose force will you join in order to fight back against the growing shadows which threaten the newly allied races? Create your character, write out your story in role-playing forums, build your profile and backstory, join in training classes, level up through your interactions and earn statuses to cease these threats to the Kingdoms! Realms of Middle Earth will allow you the creative freedoms you’ve always longed for in becoming a part of a community and sharing experiences within the works of J. R. R. Tolkien’s Lord of the Rings, Hobbit, Silmarillion, and more!</p>
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
