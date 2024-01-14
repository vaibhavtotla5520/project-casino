<?php

require_once "../Models/UserModel.php";
require_once "../Config/Constants.php";

class HomeController extends UserModel
{
    public function verifyOtp($user_id,$otp) {
        if(!empty($user_id) || !empty($otp)) {
            $response = $this->verify_otp($user_id,$otp);
            return $response["status"] ? 1 : 0;
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }

    public function refreshOtp($user_id) {
        $otp_new = rand(111000, 999999);
        $otp = $this->refresh_otp($user_id,$otp_new);
        return $otp;
    }

    public function updateWallet($user_id, $type, $amount) {
        if(!empty($user_id) || !empty($type) || !empty($amount)) {
            $response = $this->WalletModel($user_id, $type, $amount);
            return [
                "status" => 1,
                "message" => "Wallet Amount Updated",
                "amount" => $response["current_amount"]
            ];
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }

    public function getWallet($user_id, $type) {
        if(!empty($user_id) || !empty($type)) {
            $response = $this->WalletModel($user_id, $type, 0.00);
            return $response;
        } else {
            return ["status" => 0, "message" => "Empty Parameters Value"];
        }
    }

    public function register($name, $password, $cnf_password, $mobile)
    {
        if (!empty($name) || !empty($mobile) || !empty($password) || !empty($cnf_password)) {
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
        if (!empty($mobile) || !empty($password)) {
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
