

    <!--MULTIPLE-CHOICE-->
    <section id="multiple-choice">
        <div class="container-fluid">
            <div class="full-page">
                <div class="header">QUIZ NO : 1 <br>SUBJECT NAME : Quiz Nme Here</div>

                <?php
                include_once("left-panel.php");
                ?>

                <div class="main-panel">
                    <h6>
                        QUESTION NO : <?php echo $question_no;?>
                        <hr>
                    </h6>

                    <div class="question-content">
                        <p class="question-header">
                            <?php echo $question;?>
                        </p>
                    </div>

                    <div class="options">
                        <form class="form" role="form">

                            <?php
                                for($i=0; $i<count($options); $i++){
                                    echo<<<OPTION
                                    <div class="inputGroup">
                                        <input id="option{$i}" name="option{$i}" type="checkbox" class="sev_check"/>
                                        <label for="option{$i}" class="hover-to-big">$options[$i]</label>
                                    </div>
OPTION;
                                }
                            ?>

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
    <!--END OF /MULTIPLE-CHOICE SECTION-->

