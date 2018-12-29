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


    public function __construct($email, $forename, $surname, $age, $gender, $race, $power, $will, $agility, $avatar) {
        $this->email = $email;
        $this->forename = $forename;
        $this->surname = $surname;
        $this->age = $age;
        $this->gender = $gender;
        $this->race = $race;
        $this->power = $power;
        $this->will = $will;
        $this->agility = $agility;
        $this->avatar = $avatar;
    }


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
