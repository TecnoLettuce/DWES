<?php

//include_once '../backend/controller/ContactController.php';
include '../backend/service/ContactService.php';


echo "<h1>Bienvenido al gestor de agenda</h1>";
$contactService = new ContacService();
$agenda = $contactService->GetAgenda()->GetContacts();

if (count($agenda) > 0 ) {
    // Mostrar formulario de reset
}

for ($index=0; $index < count($agenda) ; $index++) { 
    echo "| ".$agenda[$index]->GetName()." | ".$agenda[$index]->GetNumber()." |<br/>";
}



?>