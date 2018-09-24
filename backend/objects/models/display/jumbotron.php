<?php


class Jumbotron implements iDisplayable {

    private $raw_html;
    private $heading = "";
    private $subheading = "";
    private $headertext = "";
    
    private $navbar = <<<NAVBAR
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Realms of Middle Earth</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lore">Lore</a>
            </li>
        </ul>
        <span class="navbar-text">
            <a href="/login">Login</a>
        </span>
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

    public function get_output() {
        $a = "\t<div class=\"jumbotron\">\n";
        if (isset($this->raw_html) && !is_null($this->raw_html)) {
            $b = "\t\t" . $this->raw_html . "\n";
        }
        else {
            $b = "\t\t<h1>$this->heading</h1>\n\t\t<h3>$this->subheading</h3>\n\t\t<p>$this->headertext</p>\n";
        }
        $c = "\t</div>\n";
        return $this->navbar . $a . $b . $c;
    }
}


?>
