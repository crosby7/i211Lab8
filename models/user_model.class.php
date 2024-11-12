<?php
/**
 * Author: Cameron Crosby
 * Date: 11/12/2024
 * File: user_model.class.php
 * Description: Defines the UserModel class, responsible for retrieving data on the Users table from the database
 */
class UserModel
{
    // This class has four public methods related to data retrieval and modification

    // Private attributes
    private Database $db;
    private mysqli $dbConnection;
    static private ?UserModel $_instance = null;
    private string $tblUsers;

    // Singleton constructor
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        // Escape special chars for SQL
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        // Escape special chars for SQL
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    // Method add_user: allows a user to be added to the database -- password must be hashed
    public function add_user(): bool {
        // First, check if $_POST is set. Otherwise, display an error.
        if (!isset($_POST['registration']))
        {
            $message = "Error: there was no registration submitted.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        // Get user registration info -- From the instructions, it will be set with POST
        // This is an array with username, password, email, and first/last name
        $registrationInfo = $_POST['registration'];
        
    }

}