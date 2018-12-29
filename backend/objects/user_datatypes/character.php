<?php


class Character {

    public $email;
    public $forename;
    public $surname;
    public $age;
    public $gender;
    public $race;
    public $power;
    public $will;
    public $agility;
    public $avatar;

    public function get_avatar_url() {
        if (isset($this->avatar)) {
            return "https://images.realmsofmiddle-earth/{$this->avatar}";
        }
        else {
            return null;
        }
    }

}


?>
