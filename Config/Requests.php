<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Request Handler
require_once "Constants.php";
require_once "../Controllers/HomeController.php";
$Home = new HomeController;
// print_r($_POST);die;
if (isset($_POST["token"]) && $_POST["token"] == ACCESS_TOKEN) {
    if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {
        $error = "";
        if (empty($_POST['fullname'])) {
            $error = "Name is Empty";
        } else if (empty($_POST['password'])) {
            $error = "Password is Empty";
        } else if (empty($_POST['cnf_password'])) {
            $error = "Confirm Password is Empty";
        } else if (empty($_POST['number'])) {
            $error = "Number Can't be Empty";
        } else {
            if(!empty($error)) {
                echo $error;
            } else {
                $name = $_POST['fullname'];
                $password = $_POST['password'];
                $cnf_password = $_POST['cnf_password'];
                $number = $_POST['number'];
                $response = $Home->register($name, $password, $cnf_password, $number);
                if($response['status'] == 1) {
                    echo $response['message'];
                } else {
                    echo json_encode($response);
                }
            }
        }
    }
}
