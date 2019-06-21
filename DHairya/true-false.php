<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--START OF META TAGS-->
    <meta charset="utf-8">
    <meta name="description" content="Building modern responsive website using HTML5, CSS3 and Bootstrap!">
    <meta name="keywords" content="HTML5, CSS3, jQuery, Responsive Website, Bootstrap">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <!--END OF META TAGS-->

    <!--START OF TITLE-->
    <title>TRUE-FALSE</title>

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <!--DONT AWESOME-->
    <link rel="stylesheet" href="plugin/fontawesome/css/font-awesome.min.css">


    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">

    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">

    <body>

    <!--TRUE/FALSE-->
    <section id="true-false">
        <div class="container-fluid">
            <div class="full-page">
                <div class="header">QUIZ NO : 1 <br>SUBJECT NAME : Quiz Nme Here</div>

                <?php
                include_once ("left-panel.php");
                ?>

                <div class="main-panel">
                    <h6>
                        QUESTION NO : 1
                        <hr>
                    </h6>

                    <div class="question-content">
                        <p class="question-header">
                            Delhi is the capital of India?
                        </p>
                    </div>

                    <div class="options">
                        <form class="form">
                            <div class="inputGroup">
                                <input id="radio1" name="radio" type="radio"/>
                                <label for="radio1">Yes</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio2" name="radio" type="radio"/>
                                <label for="radio2">No</label>
                            </div>
                        </form>

                    </div>

                    <div class="submit-ans">
                        <a href="" class="submit-ans-btn">Submit Answer</a>
                    </div>

                </div>

                <?php
                include_once ("right-panel.php");
                ?>

            </div>
        </div>
        <!--END OF .container-->
    </section>
    <!--END OF TRUE/FALSE SECTION-->


</body>

<!--SCRIPT-->
<script src="js/jquery-3.3.1.min.js"></script>
<!--BOOTSTRAP SCRIPT-->
<script src="plugin/bootstrap/js/bootstrap.min.js"></script>
<!--OUR SCRIPT-->
<script src="js/script.js"></script>

</head>
</html>
<?php
?>