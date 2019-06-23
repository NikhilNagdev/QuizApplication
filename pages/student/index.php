<!DOCTYPE html>
<html lang="en">
<?php
require_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/database/models/Quiz.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/helper/Helper.class.php";
$helper = new Helper();
$quiz = new Quiz();
$subject = new Subject();

include_once("../includes/header.php");
?>
<body>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <?php
        include_once ("../includes/logo-header.php");
        ?>
        <!-- End Logo Header -->

        <?php
        include_once("../includes/navbar.php");
        ?>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php
    include_once ("includes/sidebar.php");
    ?>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-dark-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!--DASHBOARD VALUES-->
            <?php
            include_once ("includes/dashboard.php");
            ?>
        </div>
    </div>


</div>
<!--   Core JS Files   -->
<!--   Core JS Files   -->
<?php
include_once("../includes/core-scripts.php");
?>
</body>
</html>