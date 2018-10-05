<?php


class DeathError {
    public $error;
    function __construct($error) {
        $this->error = $error;
        die(json_encode($this));
    }
}


?>
