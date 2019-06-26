<!DOCTYPE html>
<html lang="en">
<?php
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
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>


            <div class="page-inner mt--5">

                <!--DASHBOARD VALUES-->
                <?php
                include_once ("includes/dashboard.php");
                ?>
            </div>
        </div>
    </div>
<!--   Core JS Files   -->
<?php
include_once("../includes/core-scripts.php");
?>

</body>
</html>