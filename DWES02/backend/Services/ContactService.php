<?php

include_once '../Data/Database.php';
include_once '../Models/ContatctDTO.php';

    class ContactService{

        private $database = null;

        public function __construct()
        {
            $database = new Database();  
        }

        public function GetContacts() {
            $query = "SELECT * FROM contacts";
            $database = new Database();
            $resultStmt = $database->conn->query($query);

            $extractedContacts = array();
            
            while ($row = $resultStmt->fetch(PDO::FETCH_ASSOC)) {
                $contact = new ContactDTO();
                $contact->name=$row["Name"];
                $contact->number=$row["Number"];
                array_push($extractedContacts, $contact);
            }
            return $extractedContacts;

        }

        public function GetContactByName($name) {
            $query = "SELECT * FROM contacts WHERE contacts.Name Like '".$name."'";
            $database = new Database();
            $resultStmt = $database->conn->query($query);

            $contact = new ContactDTO();
            
            while ($row = $resultStmt->fetch(PDO::FETCH_ASSOC)) {
                
                $contact->name=$row["Name"];
                $contact->number=$row["Number"];
            }
            return $contact;
        }

        
        public function CreateContact($contact) {

            if (!empty($this->GetContactByName($contact->name)->name)) {
                return 0;
            }
            
            $database = new Database();
            $query = "INSERT INTO contacts (Name, Number) VALUES ('".$contact->name."', '".$contact->number."');";
            $stmt = $database->conn->prepare($query);
            $stmt->execute();
            return 1;

        }

        
        public function DeleteContactByName($name) {
            $database  = new Database();
            $query = "DELETE FROM contacts WHERE Name like '".$name."';";
            $stmt = $database->conn->prepare($query);
            $stmt->execute();
        }

        public function ResetDatabase() {
            $database = new Database();
            $query = "DROP TABLE contacts";
            $stmt = $database->conn->prepare($query);
            $stmt->execute();
        }

        public function UpdateContact($contact, $nameToUpdate) {
            // returns updated contact
            $database = new Database();
            $query = "UPDATE contacts SET Name = '".$contact->name."', Number = '".$contact->number."' WHERE Name LIKE '".$nameToUpdate."';";
            $stmt = $database->conn->prepare($query);
            $stmt->execute();
            return new Contact($contact->name, $contact->number);
        }

    }
?>