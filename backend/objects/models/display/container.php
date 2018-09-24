<?php


class Container implements iClassable {

    private $raw_html;
    private $rows = array();
    private $classes = array();
    
    public function add_class($classname) {
        array_push($this->classes, $classname);
    }

    public function add_row($row) {
        array_push($this->rows, $row);
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
        return "<div class=\"container " . join($this->classes) . "\">\n" . $a . "</div>\n";
    }
}


?>
