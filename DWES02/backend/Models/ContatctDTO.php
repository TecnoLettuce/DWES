<?php

    class ContactDTO {

        public $name;
        public $number;

        public function __construct($name, $number) {
            $this->name = $name;
            $this->number = $number;
        }
        
    }

?>