
<!--MULTIPLE-CORRECT-->
<section id="multiple-correct">
    <div class="container-fluid">
        <div class="full-page">
            <div class="header">QUIZ NO : 1 <br>SUBJECT NAME : Quiz Nme Here</div>

            <?php
            require_once("left-panel.php");
            ?>

            <div class="main-panel">
                <h6>
                    QUESTION NO : <?php echo $question_no;?>
                    <hr>
                </h6>

                <div class="question-content">
                    <p class="question-header">
                        Which is not POP?
                    </p>
                </div>

                <div class="options">
                    <form class="form">
                        <div class="inputGroup">
                            <input id="check1" name="check1" type="checkbox"/>
                            <label for="check1" class="hover-to-big">Java</label>
                        </div>
                        <div class="inputGroup">
                            <input id="check2" name="check2" type="checkbox"/>
                            <label for="check2" class="hover-to-big">C</label>
                        </div>
                        <div class="inputGroup">
                            <input id="check3" name="check3" type="checkbox"/>
                            <label for="check3" class="hover-to-big">C++</label>
                        </div>
                        <div class="inputGroup">
                            <input id="check4" name="check4" type="checkbox"/>
                            <label for="check4" class="hover-to-big">C#</label>
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
<!--END OF /MULTIPLE-CORRECT SECTION-->
