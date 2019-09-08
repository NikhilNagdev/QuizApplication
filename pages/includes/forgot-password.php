<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Forgot-password</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="../../assets/img/login-icon.ico" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../../assets/css/fonts.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/azzara.min.css">
</head>
<?php
if(isset($_POST['Forgotpassword'])){
    $email = $_POST['email'];
    require_once "../../helper/Helper.class.php";
    $helper = new Helper();
    $helper->processForgotPassword($email);
}
?>
<body class="login forgot-password">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Forgot Password</h3>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
        <div class="login-form">
            <form action="#" method="post">
                <div class="form-group form-floating-label">
                    <input id="email" name="email" type="email" class="form-control input-border-bottom" required>
                    <label for="email" class="placeholder">Email Address</label>
                </div>
                <div class="form-action mb-3">
                    <input type="submit" class="btn btn-primary btn-rounded btn-login" name="Forgotpassword" id="Forgotpassword" value="Submit">
                </div>
                <div class="login-account">
                    <span class="msg">Don't have an account yet ?</span>
                    <a href="#" id="show-signup" class="link">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
<?php
include_once("core-scripts.php");
?>
<script src="../../assets/js/ready.min.js"></script>
</html>