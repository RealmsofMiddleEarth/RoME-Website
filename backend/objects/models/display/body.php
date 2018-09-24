<?php


class Body implements iDisplayable {

    private $jumbotron;
    private $containers = array();
    private $raw_html;

    public function __construct() {
        $this->jumbotron = new Jumbotron();
    }

    public function set_jumbotron($jumbotron) {
        $this->jumbotron = $jumbotron;
    }

    public function add_container($container) {
        array_push($this->containers, $container);
    }

    public function set_raw_html($text) {
        $this->raw_html = $text;
    }

    public function get_output() {
        $a = "";
        if (isset($this->jumbotron) && !is_null($this->jumbotron)) {
            $a = $this->jumbotron->get_output() . "\n";
        }
        $b = "";
        if (isset($this->raw_html) && !is_null($this->raw_html)) {
            $b = $this->raw_html;
        }
        else {
            foreach($this->containers as $container) {
                $b .= $container->get_output() . "\n";
            }
        }
        return $a . $b;
    }
}


?>