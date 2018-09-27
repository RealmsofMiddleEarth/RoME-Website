<?php


class Page implements iDisplayable {

    public $head;
    public $body;

    public function __construct() {
        $this->head = new Head();
        $this->body = new Body();
    }

    // The three methods to access the head
    public function set_title($title, $full_title=FALSE) {
        $this->head->set_title($title, $full_title);
    }

    public function add_css_file($filename, $include_static=TRUE) {
        $this->head->add_css_file($filename, $include_static);
    }

    public function add_js_file($filename, $include_static=TRUE) {
        $this->head->add_js_file($filename, $include_static);
    }

    // Methods to access the body
    public function set_jumbotron($jumbotron) {
        $this->body->set_jumbotron($jumbotron);
    }

    public function add_container($containter) {
        $this->body->add_container($containter);
    }

    // Standard get_output that goes through everything
    public function get_output() {
        return $this->head->get_output() . $this->body->get_output() . "</body>\n</html>\n";
    }

}

?>
