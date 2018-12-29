<?php


class User {
    public $email;
    public $characters = array();

    public function add_character($character) {
        array_push($this->characters, $character);
    }
}


?>
