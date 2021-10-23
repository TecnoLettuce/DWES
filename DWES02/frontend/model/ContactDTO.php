<?php

class ContatDTO
{
    
    public $name;
    public $number;

    function __construct()
    {
        
    }

    public function GetName() {
        return $this->name;
    
    }
    public function SetName($name) {
        $this->name = $name;
    }

    public function GetNumber() {
        return $this->number;
    }
    
    public function SetNumber($number) {
        $this->number = $number;
    }
}

?>