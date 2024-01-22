<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// echo "<pre>";
require_once "Config/Crypt.php";
$crypt = new Crypt;
$token = $crypt->encrypt("CashWinTest999");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("Config/Requests.php",
    {
      submit: "get_wallet",
    //   submit: "update_wallet",
    //   amount: 50,
    //   type: "+",
      token: "<?php echo $token;?>"
    },
    function(data,status){
      alert(data );
    });
  });
});
</script>
<button>TEST</button>
<!-- <h4>Register</h4>
<form method="post" action="Config/Requests.php">
    <input type="text" name="fullname" placeholder="Your Full Name"> <br>
    <input type="tel" name="number" placeholder="Your Mobile Number"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="password" name="cnf_password" placeholder="Confirm Password"> <br>
    <input type="submit" name="submit" value="Register">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
</form> -->

<!-- <h4>Login</h4>
<form method="post" action="Config/Requests.php">
    <input type="tel" name="number" placeholder="Your Mobile Number"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="submit" name="submit" value="Login">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
</form> -->
