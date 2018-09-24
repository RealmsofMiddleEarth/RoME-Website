<?php


class Column implements iClassable {

    private $content;
    private $width = 0;
    private $classes = array();
    
    public function add_class($classname) {
        array_push($this->classes, $classname);
    }

    public function __construct($width=0) {
        $this->width = $width;
    }

    public function set_content($text) {
        $this->content = $text;    
    }

    public function get_output() {
        if (isset($this->width) && !is_null($this->width) && $this->width > 0) {
            return "<div class=\"col-$width " . join($this->classes) . "\">" . $this->content . "</div>\n";
        }
        else {
            return "<div class=\"col " . join($this->classes) . "\">" . $this->content . "</div>\n";
        }
    }
}


?>
