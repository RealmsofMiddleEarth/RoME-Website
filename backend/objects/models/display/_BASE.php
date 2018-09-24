<?php


interface iDisplayable {
    public function get_output();
}

interface iClassable extends iDisplayable {
    public function add_class($classname);
}


?>
