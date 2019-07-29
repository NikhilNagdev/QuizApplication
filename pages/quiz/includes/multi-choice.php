<div class="main-panel">
    <h6>
        QUESTION NO : <?php echo $question_no; ?>
        <hr>
    </h6>

    <div class="question-content">
        <p class="question-header">
<!--            --><?php //echo $questionText; ?>
        </p>
    </div>

    <div class="options">
        <form class="form" method="post" action="" role="form">

<!--            --><?php
////            $correctQA=array(1,2,3,4);
//            for ($i = 0; $i < count($correctQA); $i++) {
//                echo <<<OPTION
//                    <div class="inputGroup">
//                        <input id="option{$i}" name="option{$i}" type="checkbox" class="sev_check"/>
//                        <label for="option{$i}" class="hover-to-big">$correctQA[$i]</label>
//                    </div>
//OPTION;
//            }
//            ?>

        </form>

    </div>
    <div class="submit-ans">
        <!--        <a href="receiver.php" id="button1">Submit Answer</a>-->
        <button type="submit" class="submit-ans-btn" id="previous" value="previous">Previous</button>
        <button type="submit" class="submit-ans-btn" id="next" value="next">Next</button>

    </div>


</div>

