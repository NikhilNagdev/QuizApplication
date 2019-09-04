<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Reset Password</title>
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
if (!isset($_GET['token'])) {
    header("Location: ../../login.php");
} else {
    $token = $_GET['token'];
}
if(isset($_POST['Reset'])){
    include_once "../../helper/Helper.class.php";
    $helper = new Helper();
    $token  = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $helper->processResetPassword($token,$password,$confirm_password);
}
?>
<body class="login forgot-password">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Reset Password</h3>
        <div class="login-form">
            <form action="#" method="post">
                <input type="hidden" value=<?php echo "{$token}"; ?> name="token">
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom"
                           required>
                    <label for="password" class="placeholder"> New Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <div class="form-group form-floating-label">
                    <input id="confirm_password" name="confirm_password" type="password" class="form-control input-border-bottom"
                           required>
                    <label for="password" class="placeholder"> Confirm Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>

                <div class="form-action mb-3">
                    <input type="submit" class="btn btn-primary btn-rounded btn-login" name="Reset" id="Reset" value="Reset">
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