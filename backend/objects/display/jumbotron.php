<?php


class Jumbotron implements iClassable {

    private $raw_html;
    private $heading = "";
    private $subheading = "";
    private $headertext = "";
    private $classes = array();
    
    private $navbar = <<<NAVBAR
<h1 class="branding"><a href="/">
    <img class="shorttext" src="/static/images/branding/short.png" alt="The logo for Realms of Middle Earth" />
    <img class="fulltext" src="/static/images/branding/full.png" alt="The logo for Realms of Middle Earth" />
</a></h1>
<nav class="navbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="/lore">Lore</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/signup">Signup</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
    </ul>
</nav>\n
NAVBAR;
    
    public function add_class($classname) {
        array_push($this->classes, $classname);
    }

    public function set_heading($text) {
        $this->heading = $text;
    }

    public function set_subheading($text) {
        $this->subheading = $text;
    }

    public function set_headertext($text) {
        $this->headertext = $text;
    }

    public function set_raw_html($text) {
        $this->raw_html = $text;
    }

    public function get_output() {
        $a = "<div class=\"jumbotron " . join($this->classes) . "\">\n";
        if (isset($this->raw_html) && !is_null($this->raw_html)) {
            $b = "\t" . $this->raw_html . "\n";
        }
        else if (strlen($this->heading) > 0) {
            $b = "\t<h1>$this->heading</h1>\n\t<h3>$this->subheading</h3>\n\t<p>$this->headertext</p>\n";
        }
        else {
            return $this->navbar;
        }
        $c = "</div>\n";
        return $this->navbar . $a . $b . $c;
    }
}


?>
