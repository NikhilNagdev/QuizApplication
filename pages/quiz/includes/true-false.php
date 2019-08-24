<!--TRUE/FALSE-->
<section id="true-false">
    <div class="container-fluid">
        <div class="full-page">
            <div class="header">QUIZ NO : 1 <br>SUBJECT NAME : Quiz Nme Here</div>

            <?php
            include_once("left-panel.php");
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
            include_once("right-panel.php");
            ?>

        </div>
    </div>
    <!--END OF .container-->
</section>
<!--END OF TRUE/FALSE SECTION-->
