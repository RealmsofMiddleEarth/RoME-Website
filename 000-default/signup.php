<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once $_SERVER['DOCUMENT_ROOT'] . "/../backend/objects/display/__ALL__.php";


// Page variable
$page = new Page();
$page->set_title("Login");

// Form container
$form_container = new Container();
$form_container->add_class("form-container");
$form_container->set_tag("form");
$form_container->set_tag_attributes('action="javascript:void(0);" onsubmit="javascript:create_character_user(this);" method="POST"');
$content = <<<CONTENT
<div class="row">
    <div class="col-3 no-mobile"></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 form-fillout">
        <div><input required type="text" maxlength="32" name="fname" placeholder="First Name" /><input required type="text" maxlength="32" name="lname" placeholder="Last Name" /></div>
        <div><input required type="number" name="character_age" placeholder="Age" /></div>
        <div><input required type="text" maxlength="320" name="email" placeholder="Email" /><input required type="text" maxlength="320" name="confirmemail" placeholder="Confirm Email" /></div>
        <div><input required type="password" minlength="6" name="password" placeholder="Password" /><input required type="password" minlength="6" name="confirmpassword" placeholder="Confirm Password" /></div>
        <div>OOC Date of Birth: <input required type="date" name="dob" /></div>
        <div>
            Gender:<br />
            <input required id="rb0" type="radio" name="gender" value="male">Male
            <input required id="rb1" type="radio" name="gender" value="female">Female
            <input required id="rb2" type="radio" name="gender" value="fluid">Genderfluid
        </div>
        <div><input required type="checkbox" name="terms" />I agree to the terms and conditions</div>
        <div><input required type="checkbox" name="privacy" />I agree to the privacy policy</div>
        <div><input required type="checkbox" name="cookies" />I agree to the cookies policy</div>
        <div>
            Start your adventure:<br />
            <span>
                <input name="race" type="submit" value="hobbit" />
                <input name="race" type="submit" value="elf" />
                <input name="race" type="submit" value="dwarf" />
                <input name="race" type="submit" value="human" />
            </span>
        </div>
    </div>
    <div class="col-3 no-mobile"></div>
</div>
CONTENT;
$form_container->set_raw_html($content);
// $page->add_container($form_container);

// Banner row/container
$row = new Row();
$container = new Container();

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
$page->add_container($form_container);

$page->add_css_file("login");
$page->add_css_file("banner");
$page->add_css_file("column");

$page->add_js_file("create_character");

echo $page->get_output();


?>
