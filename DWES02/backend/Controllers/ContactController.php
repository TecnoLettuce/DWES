<?php

    include_once '../Services/ContactService.php';
    include_once '../Models/Contact.php';

    $ContactService = new ContactService();
    $data = json_decode(file_get_contents("php://input"));

    // Check the request method
    $RequestMethod = GetRequestMethod();

    switch ($RequestMethod) {
        case 1:
            // Get
            if (!isset($_GET["name"])) {
                echo json_encode($ContactService->GetContacts());
                break;
            }
            $name = htmlspecialchars($_GET["name"]);
            echo json_encode($ContactService->GetContactByName($name));
            break;
        
        case 2:
            // Post
            if ($data->name !=null && $data->number != null) {
                $contact = new Contact($data->name, $data->number);
                $result = $ContactService->CreateContact($contact);

                if ($result == 1) {
                    http_response_code(201);
                    break;
                }
                http_response_code(400);
                break;
            }
            
            http_response_code(400);
            break;

        case 3:
            // Put
            if ($data->name != null && $data->number != null && $data->nameToUpdate != null) {
                $contact = new Contact($data->name, $data->number);
                $contactUpdated = $ContactService->UpdateContact($contact, $data->nameToUpdate);
                echo json_encode($contactUpdated);
                http_response_code(200);
                break;
            }
            http_response_code(400);
            break;

        case 4:
            // Delete
            $ContactService->DeleteContactByName($_GET["name"]);
            http_response_code(200);
            break;
            
        default:
            http_response_code(500);
            break;
    }


    function GetRequestMethod() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return 1; 
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return 2;
        } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            return 3;
        } else {
            return 4;
        }
        return 0;
    }
?>