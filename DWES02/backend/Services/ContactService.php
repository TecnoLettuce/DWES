<?php

include_once '../Data/Database.php';

    class ContactService{

        private $database = new Database();

        public function __construct()
        {
            
        }

        public function GetContacts() {
            // returns contacts array
        }

        public function GetContactById($name) {
            // returns contact
        }

        
        public function CreateContact($contact) {
            // returns contact
        }

        
        public function DeleteContactByName($name) {
            // returns contact
        }

        public function ResetDatabase() {
            // returns NoContent -- Probablemente esto sea función de otro controlador
        }

        public function UpdateContact() {
            // returns updated contact
        }

    }
?>