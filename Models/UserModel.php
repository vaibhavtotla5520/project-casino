<?php
require_once "../Config/Database.php";
require_once "../Config/Constants.php";

class UserModel extends Database
{
    protected function reigisterModel($name, $mobile, $password)
    {
        if (!empty($name) && !empty($mobile) && !empty($password)) {
            $query = "SELECT user_id FROM users WHERE user_mobile='" . $mobile . "';";
            $result = $this->connect()->query($query);
            if ($result->num_rows > 0) {
                return [
                    "status" => 0,
                    "message" => "User Already Registered With This Mobile"
                ];
            } else {
                $registered_on = date("Y-m-d H:i:s");
                $verification = 0; //Default
                $verify_otp = rand(111111, 999999);
                // Only valid for 1 Min then change, until verification is true
                $query_insert = "INSERT INTO users (user_name, user_password, user_mobile, user_registered_on, user_verification, user_verify_otp) VALUES ('" . $name . "', '" . $password . "', '" . $mobile . "', '" . $registered_on . "', $verification, '" . $verify_otp . "')";
                if ($this->connect()->query($query_insert) === TRUE) {
                    return [
                        "status" => 1,
                        "message" => "Registered Successfuly"
                    ];
                }
            }
        } else {
            return [
                "status" => 0,
                "message" => "Empty Parameters Value"
            ];
        }
    }

    protected function LoginModel($mobile, $password)
    {
        if (!empty($mobile) && !empty($password)) {
            $query = "SELECT user_id,user_name FROM users WHERE user_mobile='" . $mobile . "' AND user_password='" . $password . "' LIMIT 1;";
            $result = $this->connect()->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $return_arr = [
                    "status" => 1,
                    "user_id" => $row["user_id"],
                    "user_name" => $row["user_name"]
                ];

                return $return_arr;
            } else {
                return [
                    "status" => 0,
                    "message" => "Invalid Number or Password"
                ];
            }
        } else {
            return [
                "status" => 0,
                "message" => "Empty Parameters Value"
            ];
        }
    }
}
