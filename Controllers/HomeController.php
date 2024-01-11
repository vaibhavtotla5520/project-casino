<?php

require_once "../Models/UserModel.php";
require_once "../Config/Constants.php";

class HomeController extends UserModel {
    public function register($name, $password, $cnf_password, $mobile) {
        if(!empty($name) && !empty($mobile) && !empty($password) && !empty($cnf_password)) {
            if($cnf_password == $password) {
                $response = $this->reigisterModel($name, $mobile, $password);
                return $response;
            } else {
                return ["status" => 0, "message" => "Confirm Password Does Not Match"];
            }
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }
}
