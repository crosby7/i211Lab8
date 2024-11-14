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

        // Unpack array for easier sql
        $userName = $registrationInfo['username'];
        $password = password_hash($registrationInfo['password'], PASSWORD_DEFAULT);
        $email = $registrationInfo['email'];
        $firstName = $registrationInfo['firstname'];
        $lastName = $registrationInfo['lastname'];

        // Create sql statement to add user
        $sql = "INSERT INTO users (username, password, email, firstname, lastname)
            VALUES ($userName, $password, $email, $firstName, $lastName)";

        // Execute sql
        $query = $this->dbConnection->query($sql);

        // Handle query failure
        if (!$query)
        {
            $message = "Error: the database registration failed.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        return true;
    }

    // Public method to verify a user's email and password
    public function verify_user(): bool {
        // First, check if $_POST is set. Otherwise, display an error.
        if (!isset($_POST['username']) || !isset($_POST['password']))
        {
            $message = "Error: there was no login submitted.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        // Store the loginAttempt info
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Create sql statement
        $sql = "SELECT (username, password) FROM users WHERE username = $username";

        // Execute the query
        $query = $this->dbConnection->query($sql);

        // Handle query failure
        if (!$query)
        {
            $message = "Error: database query failed.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        // Handle empty query result
        if ($query->num_rows == 0)
        {
            $message = "Error: no matching user found.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        // store query result in $row
        $row = $query->fetch_assoc();

        // Verify password and create cookie
        if (password_verify($password, $row['password']))
        {
            // User is verified, store username and return true
            if (session_status() === PHP_SESSION_NONE)
            {
                // Start a session
                session_start();
            }

            $_SESSION['username'] = $username;
            return true;
        }
        else {
            $message = "Error: password verification failed.";
            $view = new UserError();
            $view->display($message);
            return false;
        }
    }

    // public function to log out
    public function logout(): bool {
        // Destroy user session cookies and return true

        // Question: do we want to kill the session? No?
        $_SESSION = array();

        if (!isset($_SESSION['username']))
        {
            return true;
        }
        else {
            $message = "Error: couldn't sign out.";
            $view = new UserError();
            $view->display($message);
            return false;
        }
    }

    // public function to reset a user's password
    public function reset_password(): bool {
        // Retrieve a user's username and new password from the reset form
        if (!isset($_POST['username']) || !isset($_POST['password']))
        {
            $message = "Error: no password reset form submission detected.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        // Store username and password
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // SQL statement to update password for that user
        $sql = "UPDATE users SET password = $password WHERE username = $username";

        // Execute the query
        $query = $this->dbConnection->query($sql);

        // Handle query failure
        if (!$query)
        {
            $message = "Error: database update failed.";
            $view = new UserError();
            $view->display($message);
            return false;
        }

        if ($query->num_rows == 0) {
            $message = "Error: no user was updated.";
            $view = new UserError();
            $view->display($message);
            return false;
        }
        else {
            return true;
        }
    }
}
