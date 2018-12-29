<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
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
        <div><input required type="text" maxlength="32" name="fname" placeholder="Character's First Name" /><input required type="text" maxlength="32" name="lname" placeholder="Character's Last Name" /></div>
        <div><input required type="number" name="character_age" placeholder="Character's Age" /></div>
        <div><input required type="text" maxlength="320" name="email" placeholder="Email" /><input required type="text" maxlength="320" name="confirmemail" placeholder="Confirm Email" /></div>
        <div><input required type="password" minlength="6" name="password" placeholder="Password" /><input required type="password" minlength="6" name="confirmpassword" placeholder="Confirm Password" /></div>
        <div>IRL Date of Birth: <input required type="date" name="dob" /></div>
        <div>
            Gender:<br />
            <input required type="radio" name="gender" value="male">Male
            <input required type="radio" name="gender" value="female">Female
            <input required type="radio" name="gender" value="genderfluid">Genderfluid
        </div>
        <div>
            Race:<br />
            <input required type="radio" name="race" value="hobbit" />Hobbit
            <input required type="radio" name="race" value="elf" />Elf
            <input required type="radio" name="race" value="dwarf" />Dwarf
            <input required type="radio" name="race" value="human" />Human
        </div>
        <div><input required type="checkbox" name="terms" />I agree to the terms and conditions</div>
        <div><input required type="checkbox" name="privacy" />I agree to the privacy policy</div>
        <div><input required type="checkbox" name="cookies" />I agree to the cookies policy</div>
        <div>Start your adventure: <input type="submit" value="Create Character" /></div>
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
<div class="banner banner-yellow">
    <img src="/static/images/seals/dwarf_500.png" />
    <p>Silver, gold, and bronze</p>
    <p>Dwarves are much like the stones from which they were carved. They are unyieldingly stubborn and crafty as the side of the mountains in which they live. But they are also persistent and dedicated to the causes in which they firmly believe. They are considered honorable, with unwavering strength despite their small stature.</p>
    <ul>
        <li><b>Attributes:</b></li>
        <li>Fidelity</li>
        <li>Honesty</li>
        <li>Loyalty</li>
    </ul>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-red">
    <img src="/static/images/seals/human_500.png" />
    <p>Red, brown, and tan</p>
    <p>Men are the most diverse of all races, having the ability to live in the harshest of conditions and still battle til their wit’s end. Normally seen as farmers or soldiers, Men are brave and steadfast beings. They are known to be hard-working and possess a valiant nature which is proven in battle but carries into daily life.</p>
    <ul>
        <li><b>Attributes:</b></li>
        <li>Confidence</li>
        <li>Justice</li>
        <li>Patience</li>
    </ul>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Green banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-purple">
    <img src="/static/images/seals/elf_500.png" />
    <p>Purple, silver, and white</p>
    <p>Elves are immortal beings and carry with them the wisdom of the ages. They are fair and calm in demeanor, tending to spend their days basking in the knowledge and comforts of their own realms. Let not their beauty and prominence deny, however, that these graceful beings will defend what they believe in and hold dear.</p>
    <ul>
        <li><b>Attributes:</b></li>
        <li>Charity</li>
        <li>Patience</li>
        <li>Wisdom</li>
    </ul>
</div>
CONTENT;
$col->set_content($content);
$row->add_column($col);

// Yellow banner
$col = new Column();
$col->add_class("flex-hcenter");
$content = <<<CONTENT
<div class="banner banner-green">
    <img src="/static/images/seals/hobbit_500.png" />
    <p>Green, teal, light blue</p>
    <p>Hobbits are remarkable creatures. What they lack in stature, they make up for in resilience and spirit. They typically remain within the safety of the Shire, but curiosity beckons them beyond the borders to seek adventure. Relations are important to them (almost as important as food), and they have an unparalleled urge to help those in need.</p>
    <ul>
        <li><b>Attributes:</b></li>
        <li>Empathy</li>
        <li>Honesty</li>
        <li>Idealism</li>
    </ul>
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
