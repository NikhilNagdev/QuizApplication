<?php
require_once "document_root.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="assets/img/login-icon.ico" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['assets/css/fonts.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.min.css">
</head>
<?php
if(isset($_POST["Login"])){
    require_once($_SERVER['DOCUMENT_ROOT']."/helper/Helper.class.php");
    $helper = new Helper();
//    die(var_dump($_POST));
    $helper->processLogin();
}

?>
<body class="login">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Sign In</h3>
        <div class="login-form">
            <form action="index.php" method="post">
                <div class="form-group form-floating-label">
                    <input id="email" name="email" type="email" class="form-control input-border-bottom" required>
                    <label for="email" class="placeholder">Email Address</label>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom"
                           required>
                    <label for="password" class="placeholder">Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <div class="row form-sub m-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Remember Me</label>
                    </div>
                    <a href="pages/includes/forgot-password.php" class="link float-right">Forget Password ?</a>
                </div>
                <div class="form-action mb-3">
                    <input type="submit" class="btn btn-primary btn-rounded btn-login" name="Login" id="Login" value="Login">

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
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<?php

include_once($_SERVER['DOCUMENT_ROOT']."/pages/includes/core-scripts.php");
?>
<script src="assets/js/ready.min.js"></script>
</html>