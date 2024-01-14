<?php
require_once "../Config/Database.php";
require_once "../Config/Constants.php";

class UserModel extends Database
{

    protected function refresh_otp($user_id, $new_otp)
    {
        $query = "SELECT user_verify_otp FROM users WHERE user_id = " . $user_id . " LIMIT 1;";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            $otp = $result->fetch_row();
            if ($otp[0] == $new_otp) {
                $new_otp = rand(111000, 999999);
            }
            $query_update = "UPDATE users SET user_verify_otp = '" . $new_otp . "' WHERE user_id = " . $user_id . "; ";
            if ($this->connect()->query($query_update) === TRUE) {
                return $new_otp;
            }
        }
    }

    protected function verify_otp($user_id, $otp_to_verify)
    {
        $query = "SELECT user_verify_otp FROM users WHERE user_id = " . $user_id . " LIMIT 1;";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            $otp = $result->fetch_row();
            if ($otp_to_verify == $otp[0]) {
                $query_update = "UPDATE users SET user_verification = 1 WHERE user_id = " . $user_id . "; ";
                if ($this->connect()->query($query_update) === TRUE) {
                    return [
                        "status" => 1,
                        "message" => "verified"
                    ];
                }
            } else {
                return [
                    "status" => 0,
                    "message" => "not verified"
                ];
            }
        }
    }

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
                $user_wallet = 0.00; //in Rs.
                $verify_otp = rand(111000, 999999);
                // Only valid for 1 Min then change, until verification is true
                $query_insert = "INSERT INTO users (user_name, user_password, user_mobile, user_registered_on, user_verification, user_waller, user_verify_otp) VALUES ('" . $name . "', '" . $password . "', '" . $mobile . "', '" . $registered_on . "', $verification, $user_wallet, '" . $verify_otp . "')";
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

    protected function WalletModel($user_id, $type, $amount)
    {
        $query = "SELECT user_wallet FROM users WHERE user_id = " . $user_id . " AND user_verification = 1 LIMIT 1;";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            $wallet = $result->fetch_row();
            $wallet_amount = $wallet[0];
            switch ($type) {
                case "+":
                    // Add Amount
                    $wallet_amount += $amount;
                    break;
                case "-":
                    // Deduct Amount
                    $wallet_amount -= $amount;
                    break;
                case "FETCH":
                    return $wallet_amount;
                    break;
                default:
            }
            $query_update = "UPDATE users SET user_wallet = '" . $wallet_amount . "' WHERE user_id = " . $user_id . "; ";
            if ($this->connect()->query($query_update) === TRUE) {
                return [
                    "status" => 1,
                    "current_amount" => $wallet_amount,
                    "message" => "wallet Updated",
                    "previous_amount" => $amount
                ];
            }
        }
    }
}
