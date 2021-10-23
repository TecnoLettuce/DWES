<?php

class Contact
{
    public $name;
    public $number;
    
    public function __construct()
    {
        
    }

    public function GetName() {
        return $this->name;
    }

    public function GetNumber() {
        return $this->number;
    }

    public function SetName($name) {
        $this->name = $name;
    }

    public function SetNumber($number) {
        $this->number = $number;
    }
}

?>