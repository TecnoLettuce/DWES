<?php

include_once './Contact.php';

class Agenda
{
    public $contacts = array();

    public function __construct()
    {

    }

    public function GetContacts() {
        return $this->contacts;
    }

    public function SaveNewContact($contact) {
        array_push($this->contacts, $contact);
    }

    public function DeleteContact($contact) {
        //TBD
    }

    public function UpdateContact($contact) {
        //TBD
    }

    public function Reset() {
        unset($this->contacts);
    }

    public function UserExists($contact) {

        foreach ($this->contacts as $user) {
            if ($user->name == $contact->name) {
                return true;
            }
        }
        return false;
    }

    public function NumberExists($contact) {

        foreach ($this->contacts as $user) {
            if ($user->number == $contact->number) {
                return true;
            }
        }
        return false;
    }

    
}



?>