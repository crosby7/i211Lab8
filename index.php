<?php

/*
 * Author: your name
 * Date: today's date
 * Name: index.php
 * Description: short description about this file
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//default action is to list all toys
$action = $_GET['action'] ?? 'index';

//invoke appropriate method depending on action value
if($action === 'index') {
    $user_controller->index();
}
else if($action === 'register') {
    $user_controller->register();
}
else if($action === 'login') {
    $user_controller->login();
}
else if($action === 'verify') {
    $user_controller->verify();
}
else if($action === 'logout') {
    $user_controller->logout();
}
else if($action === 'reset') {
    $user_controller->reset();
}
else if($action === 'do_reset') {
    $user_controller->do_reset();
}
else if ($action === 'error'){
//display an error message
    $message = $_GET['message'] ?? 'We are sorry, but an error has occurred.';
    $user_controller->error($message);
}
else {
    $message = "Invalid action was requested.";
    $user_controller->error($message);
}
