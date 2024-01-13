<?php

require_once "../Models/UserModel.php";
require_once "../Config/Constants.php";

class HomeController extends UserModel
{

    public function register($name, $password, $cnf_password, $mobile)
    {
        if (!empty($name) && !empty($mobile) && !empty($password) && !empty($cnf_password)) {
            if ($cnf_password == $password) {
                $response = $this->reigisterModel($name, $mobile, $password);
                return $response;
            } else {
                return ["status" => 0, "message" => "Confirm Password Does Not Match"];
            }
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }
    public function login($mobile, $password)
    {
        if (!empty($mobile) && !empty($password)) {
            $response = $this->LoginModel($mobile, $password);
            // return $response;
            if($response["status"] == 1) {
                $_SESSION["user_name"] = $response["user_name"];
                $_SESSION["user_id"] = $response["user_id"];
                return [
                    "status" => 1,
                    "message" => "SESSION STARTED"
                ];
            } else {
                return [
                    "status" => 0,
                    "message" => $response["message"]
                ];
            }
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }
}
