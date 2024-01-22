<?php include 'includes/header.php'; ?>


<div class="container" style="height: 100px;"></div>

<!-- Login Section Section Starts Here -->
<div class="login-section padding-top padding-bottom">
    <div class=" container">
        <div class="account-wrapper">
            <h3 class="title">Register Now</h3>
            <form class="account-form text-start" id="submitform">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" placeholder="Your Full Name" name="fullname">
                </div>
                <!-- <div class="form-group">
                    <label>Surname:</label>
                    <input type="text" name="surname">
                </div> -->
                <div class="number-group">
                    <label>Phone Number:</label>
                    <select class="form-select" aria-label="Default select example" disabled>
                        <option selected>+91</option>
                    </select>
                    <input type="text" name="number" id="numberInput">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" placeholder="Confirm Password" name="cnf_password">
                </div>
                <input type="hidden" name="submit" value="Register">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="">
                    <button class="default-button" id="getStartedButton" style="margin:auto;"><span>Get Started Now</span></button>
                </div>
            </form>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog login-section" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verify OTP</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                      <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                  </div>
                  <div class="modal-body account-wrapper">
                    <!-- ... -->
                    <div class="form-group">
                        <label>Enter OTP:</label>
                        <input type="text" name="otp" id="otpInput" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary">Verify</button> -->
                    <button class="d-block default-button" id="verifyButton" style="margin:auto;"><span>Verify</span></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Already a member? <a href="login.php">Login</a></span>
            </div>
        </div>
    </div>
</div>
<!-- Login Section Section Ends Here -->
<script>
$(document).ready(function() {
    // Function to get form data
    function getFormData() {
        var formData = {};
        $('#submitform input').each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        return formData;
    }

    // When Get Started button is clicked
    $('#getStartedButton').on('click', function() {
      event.preventDefault();
        var formData = getFormData();
        $.ajax({
            dataType: 'json',
            url: '<?php echo REQUEST_URL; ?>',
            method: 'POST',
            data: formData,
            success: function(response) {
                if(response.status == 1) {
                  $('#Modal').modal('show');
                } else {
                  alert(response);
                }
            }
        });
    });

    $('#verifyButton').on('click', function() {
        var otpValue = $('#otpInput').val();
        var numberValue = $('#numberInput').val();
        $.ajax({
            dataType: 'json',
            url: '<?php echo REQUEST_URL; ?>',
            method: 'POST',
            data: {
              otp: otpValue,
              number: numberValue,
              token: '<?php echo $token; ?>',
            },
            success: function(response) {
              if(response.status == 1) {
                $('#Modal').modal('hide');
                alert("User Registered, Lets Get Started");
                window.location.href = "login.php";
              } else {
                alert(response.message);
              }
            }
        });
    });
});
</script>
<?php include 'includes/footer.php'; ?>
