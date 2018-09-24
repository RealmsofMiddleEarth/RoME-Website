<?php


class Jumbotron implements iDisplayable {

    private $raw_html;
    private $heading = "";
    private $subheading = "";
    private $headertext = "";
    
    private $navbar = <<<NAVBAR
<div class="branding"></div>
<h1 class="branding"><span>Realms of Middle Earth</span></h1>
<nav class="navbar navbar-expand-lg navbar-right">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/lore">Lore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
        </ul>
    </div>
</nav>\n
NAVBAR;

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
        $a = "<div class=\"jumbotron\">\n";
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
