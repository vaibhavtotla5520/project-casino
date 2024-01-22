<?php 
    include 'includes/header.php'; 
?>


<div class="container" style="height: 100px;"></div>

<!-- Login Section Section Starts Here -->
<div class="login-section padding-top padding-bottom">
    <div class=" container">
        <div class="account-wrapper">
            <h3 class="title">Login</h3>
            <form class="account-form text-start" id="submitform">
                <div class="form-group">
                    <label>User Mobile:</label>
                    <input type="tel" name="number">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                        <div class="checkgroup">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <a href="#">Forget Password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <button class="d-block default-button"><span>Submit Now</span></button>
                </div>
                <input type="hidden" name="submit" value="Login">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Don’t Have any Account? <a href="register1.php"> Sign Up</a></span>
            </div>
        </div>
    </div>
</div>
<!-- Login Section Section Ends Here -->
<script>
    $('#submitform').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo REQUEST_URL; ?>",
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>