<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// echo "<pre>";
?>
<h4>Register</h4>
<form method="post" action="Config/Requests.php">
    <input type="text" name="fullname" placeholder="Your Full Name"> <br>
    <input type="tel" name="number" placeholder="Your Mobile Number"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="password" name="cnf_password" placeholder="Confirm Password"> <br>
    <input type="submit" name="submit" value="Register">
    <input type="hidden" name="token" value="DEMO-TOKEN-1234">
</form>