<?php


class Body implements iDisplayable {

    private $jumbotron;
    private $rows = array();

    public function set_jumbotron($jumbotron) {
        $this->jumbotron = $jumbotron;
    }

    public function add_row($row) {
        array_push($this->rows, $row);
    }

    public function get_output() {
        $a = "";
        if (isset($this->jumbotron) && !is_null($this->jumbotron)) {
            $a = $this->jumbotron->get_output() . "\n";
        }
        $b = "";
        foreach($this->rows as $row) {
            $b .= $row->get_output() . "\n";
        }
        return $a . $b;
    }
}


?>