<?php


class Container implements iClassable {

    private $raw_html;
    private $rows = array();
    private $classes = array();
    private $tag = "div";
    private $attributes;
    
    public function add_class($classname) {
        array_push($this->classes, $classname);
    }

    public function add_row($row) {
        array_push($this->rows, $row);
    }

    public function set_raw_html($text) {
        $this->raw_html = $text;
    }

    public function set_tag($tag) {
        $this->tag = $tag;
    }

    public function set_tag_attributes($attributes) {
        $this->attributes = $attributes;
    }

    public function get_output() {
        $a = "";
        if (isset($this->raw_html) && !is_null($this->raw_html)) {
            $a = $this->raw_html;
        }
        else {
            foreach($this->rows as $row) {
                $a .= $row->get_output() . "\n";
            }
        }
        return "<$this->tag $this->attributes class=\"container " . join($this->classes) . "\">\n" . $a . "</$this->tag>\n";
    }
}


?>
