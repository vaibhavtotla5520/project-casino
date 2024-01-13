<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Crypt.php";
require_once "Constants.php";
require_once "../Controllers/HomeController.php";

$crypt = new Crypt;
$Home = new HomeController;

if (isset($_POST["token"]) && $crypt->decrypt($_POST["token"]) == ACCESS_TOKEN) {
    // Register
    if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {
        // print_r($_POST);die;
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
            $name = $_POST['fullname'];
            $password = $_POST['password'];
            $cnf_password = $_POST['cnf_password'];
            $number = $_POST['number'];
            $response = $Home->register($name, $password, $cnf_password, $number);
            if ($response['status'] == 1) {
                echo json_encode($response);
            } else {
                echo json_encode($response);
            }
        }
        if ($error != "")
            echo $error;
    }
    // Login
    // die($_POST["submit"]);
    if (isset($_POST["submit"]) && $_POST["submit"] == "Login") {
        $error = "";
        if (empty($_POST['number'])) {
            $error = "Number is Empty";
        } else if (empty($_POST['password'])) {
            $error = "Password is Empty";
        } else {
            $number = $_POST['number'];
            $password = $_POST['password'];
            $response = $Home->login($number, $password);
            if ($response['status'] == 1) {
                echo json_encode($response);
                // print_r($response);
            } else {
                echo json_encode($response);
            }
        }
        if ($error != "")
            echo $error;
    }
} else {
    echo RETURN_HOME;
}
