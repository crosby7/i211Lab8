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
        $this->user_model = new UserModel();
    }

    public function index()
    {
        //create an object of the ToyView class
        $view = new Index();
        //display the registration form
        $view->display("placeholder");
    }

    public function register()
    {
        $user = $this->user_model->add_user();

        if (!$user) {
            $message = "An error occured and user could not be added.";
            $view = new UserError();
            $view->display($message);
            return;
        }

        $view = new Register();
        $view->display();
    }
    public function login()
    {
        $view = new Login();
        $view->display();
    }
    public function verify()
    {
        $verify = $this->user_model->verify_user();
        if (!$verify) {
            $message = "User verification unsuccessful.";
            $view = new UserError();
            $view->display($message);
            return;
        }

        $view = new VerifyUser();
        $view->display();
    }
    public function logout()
    {
        $logout = $this->user_model->logout();
        if (!$logout) {
            $message = "An error has prevented you from logging out.";
            $view = new UserError();
            $view->display($message);
            return;
        }

        $view = new Logout();
        $view->display();
    }
    public function reset()
    {
        //check to see if user is logged in
        if (!isset($_SESSION['username'])) {
            $message = "You must be logged in to reset your password.";
            $view = new UserError();
            $view->display($message);
            return;
        }
        $view = new Reset();
        $view->display();
    }
    public function do_reset()
    {
        $reset = $this->user_model->reset_password();
        if (!$reset) {
            $message = "Sorry but the password reset was not successful.";
            $view = new UserError();
            $view->display($message);
            return;

        }
        $view = new ResetConfirm();
        $view->display();

    }
    public function error($message)
    {
        //create an object of the Error class
        $error = new UserError();
        //display the error page
        $error->display($message);
    }

}