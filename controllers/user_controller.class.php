<?php
/**
 * Author: Alfred Acevedo-Rodriguez
 * Date: 11/13/2024
 * File: user_controller.class.php
 * Description:Define controller class to coordinate between MVC modules.
 */

class UserController {
    private UserModel $user_model;

    public function __construct(){
        //create an object of UserModel class
        $this->user_model = UserModel::getUserModel();
    }
    //display index page
    public function index(): void
    {
        //create an object of the ToyView class
        $view = new Index();
        //display the registration form
        $view->display("placeholder");
    }
     //register user to database
    public function register(): void
    {
        $user = $this->user_model->add_user();

        if (!$user) {
            $message = "An error occurred and user could not be added.";
            $view = new UserError();
            $view->display($message);
            return;
        }
        //display register message
        $view = new Register();
        $view->display();
    }
    //display login page form
    public function login(): void
    {
        //display login form
        $view = new Login();
        $view->display();
    }
    //verify user credentials to properly login
    public function verify(): void
    {
        $verify = $this->user_model->verify_user();
        if (!$verify) {
            $message = "User verification unsuccessful.";
            $view = new UserError();
            $view->display($message);
            return;
        }
        //display successful login
        $view = new VerifyUser();
        $view->display();
    }
    //logout user
    public function logout(): void
    {
        //
        $logout = $this->user_model->logout();
        if (!$logout) {
            $message = "An error has prevented you from logging out.";
            $view = new UserError();
            $view->display($message);
            return;
        }
         //display logout success
        $view = new Logout();
        $view->display();
    }
    //display the reset password form
    public function reset(): void
    {
        //check to see if user is logged in
        if (!isset($_SESSION['username'])) {
            $message = "You must be logged in to reset your password.";
            $view = new UserError();
            $view->display($message);
            return;
        }
        //display password reset form
        $view = new Reset();
        $view->display();
    }
    //actually reset the password in the database
    public function do_reset(): void
    {
        $reset = $this->user_model->reset_password();
        if (!$reset) {
            $message = "Sorry but the password reset was not successful.";
            $view = new UserError();
            $view->display($message);
            return;

        }
        //display successful password change
        $view = new ResetConfirm();
        $view->display();

    }
    //create error message
    public function error($message): void
    {
        //create an object of the Error class
        $error = new UserError();
        //display the error page
        $error->display($message);
    }

}