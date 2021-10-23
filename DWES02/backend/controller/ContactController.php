<?php

    include_once '../service/ContactService.php';

    $reset = $_GET["Reset"];
    $name = $_GET["name"];
    $number = $_GET["number"];

    $contactService = new ContacService();

?>