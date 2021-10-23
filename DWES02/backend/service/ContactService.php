<?php 

include_once '../data/model/Agenda.php';

class ContacService
{
    public $agenda;

    public function __construct() 
    {
        $this->agenda = new Agenda();
    }

    public function ValidateData ($contact) {
        // TBD
        if (!$this->agenda->UserExists($contact) && isset($contact->number)) {
            //No existe nombre y tenemos numero -> Crear
            return 0;
        } elseif ($this->agenda->UserExists($contact) && isset($contact->number)) {
            // Existe nombre y tenemos numero -> Update
            return 1;
        } elseif ($this->agenda->UserExists($contact) && !isset($contact->number)) {
            // Existe usuario pero no tengo numero -> Delete 
            return 2;
        } else {
            return -1;
        }
    }

    public function GetAgenda(){
        return $this->agenda;
    }
}

?>