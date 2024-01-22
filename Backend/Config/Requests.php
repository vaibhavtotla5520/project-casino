<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Crypt.php";
require_once "Constants.php";
require_once "../Controllers/HomeController.php";

$crypt = new Crypt;
$Home = new HomeController;
// echo "<pre>";
// print_r($Home->verifyOtp(4,"396837"));
// print_r($Home->refreshOtp(4));
// print_r($Home->getWallet(4,"FETCH"));
// print_r($Home->updateWallet(4,"+",100.00));
// print_r($Home->updateWallet(4,"-",100.00));

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["token"]) && $crypt->decrypt($_POST["token"]) == ACCESS_TOKEN) {
    // Register
    // print_r($_POST);die;
    if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {
        $error = "";
        if (empty($_POST['fullname'])) {
            $error = "Name is Empty";
        } else if (empty($_POST['number'])) {
            $error = "Number Can't be Empty";
        } else if (empty($_POST['password'])) {
            $error = "Password is Empty";
        } else if (empty($_POST['cnf_password'])) {
            $error = "Confirm Password is Empty";
        }  else {
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
            echo json_encode($error);
    }

    // Verify Otp
    if (!empty($_POST['otp']) && isset($_POST['otp']) && $_POST['number']) {
        $otp = $_POST["otp"];
        $number = $_POST['number'];
        $user_id = $Home->getUserIdFromNumber($number);
        if ($Home->verifyOtp($user_id, $otp)) {
        }
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

    if (isset($_POST["submit"]) && $_POST["submit"] == "Logout") {
        if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            if ($Home->logout($user_id)) {
                echo "Logged Out Successfuly";
            }
        }
    }

    if (isset($_POST["submit"]) && $_POST["submit"] == "get_wallet") {
        echo $Home->getWallet(4, "FETCH");
    }
    if (isset($_POST["submit"]) && $_POST["submit"] == "update_wallet") {
        if (!empty($_POST["amount"])) {
            echo $Home->updateWallet(4, "FETCH", $_POST["amount"]);
        }
    }
} else {
    // echo RETURN_HOME;
}
