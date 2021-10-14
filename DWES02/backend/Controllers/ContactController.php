<?php
/*
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
*/
    include_once '../Services/ContactService.php';

    $ContactService = new ContactService();

    // Check the request method
    $RequestMethod = GetRequestMethod();

    switch ($RequestMethod) {
        case 1:
            // Get
            break;
        
        case 2:
            // Post
            break;

        case 3:
            // Put
            break;

        case 1:
            // Delete
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