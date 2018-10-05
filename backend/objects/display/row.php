<?php


class Row implements iClassable {

    private $raw_html;
    private $columns = array();
    private $classes = array();
    
    public function add_class($classname) {
        array_push($this->classes, $classname);
    }

    public function add_column($col) {
        array_push($this->columns, $col);
    }

    public function get_output() {
        $a = "";
        if (isset($this->raw_html) && !is_null($this->raw_html)) {
            $a = $this->raw_html;
        }
        else {
            foreach($this->columns as $col) {
                $a .= $col->get_output() . "\n";
            }
        }
        return "<div class=\"row " . join($this->classes) . "\">\n" . $a . "</div>\n";
    }
}


?>