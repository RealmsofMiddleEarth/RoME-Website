<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/models/display/__ALL__.php";


// Page variable
$page = new Page();
$page->set_title("Login");

// Form container/row
$row = new Row();
$container = new Container();

// Form
$col = new Column();
$content = <<<CONTENT
<form class="container form-container">
    <div class="row">
        <div class="col">
            <input type="text" name="fname" placeholder="First Name" />
        </div>
        <div class="col">
            <input type="text" name="lname" placeholder="Last Name" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="age"><input type="number" name="age" placeholder="Age" />
        </div>
        <div class="col">
            <p>Gender: </p>
            <p><input type="radio" name="gender" value="male">Male</p>
            <p><input type="radio" name="gender" value="female">Female</p>
            <p><input type="radio" name="gender" value="fluid">Genderfluid</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" name="email" placeholder="Email" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" name="confirmemail" placeholder="Confirm Email" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="password" name="password" placeholder="Password" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="password" name="confirmpassword" placeholder="Confirm Password" />
        </div>
    </div>
</form>
CONTENT;
$col->set_content($content);
$row->add_column($col);
$container->add_row($row);
$page->add_container($container);

// Banner row/container
$row = new Row();
$container = new Container();
// https://picsum.photos/200

// Red banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-red">
    <img src="https://picsum.photos/200?random" />
    <p>Lorem ipsum etc I don't know what to type here and I don't really want to tab out so I'll just type until it feels like a goodf enough width WEW</p>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Purple banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-purple">
    <img src="https://picsum.photos/200?random" />
    <p>Lorem ipsum etc I don't know what to type here and I don't really want to tab out so I'll just type until it feels like a goodf enough width WEW</p>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Green banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-green">
    <img src="https://picsum.photos/200?random" />
    <p>Lorem ipsum etc I don't know what to type here and I don't really want to tab out so I'll just type until it feels like a goodf enough width WEW</p>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Yellow banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-yellow">
    <img src="https://picsum.photos/200?random" />
    <p>Lorem ipsum etc I don't know what to type here and I don't really want to tab out so I'll just type until it feels like a goodf enough width WEW</p>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Add banners to page
$container->add_row($row);
$page->add_container($container);

$page->add_css_file("login");
$page->add_css_file("banner");
$page->add_css_file("column");

echo $page->get_output();


?>
