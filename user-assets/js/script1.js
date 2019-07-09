$(document).ready(function(){
    // $.get("receiver.php", function(data){
    //     alert(data);
    //     $('#container').html(data);
    // });
    alert("hi");
    $.ajax({

        url: "quiz-question.php",
        type: 'post',
        dataType: 'html',
        success: function (data) {
            $('.question-header').html(data);
        }
    });
    $var=1;
    $('#submit-answer').click(function(){

        $.ajax({
            url: "quiz-question.php",
            type: 'post',
            dataType: 'html',
            success: function (data) {
                var arr = JSON.parse(data);
                $('.question-header').html(arr.question);
                i=0;
                $("div.options form").empty();
                $.each (arr,function (key,value) {
                    if (key!=="question") {
                        $("div.options form").append("<div class=\"inputGroup\"><input id=\"option" + i + "\" name=\"option" + i + "\" type=\"checkbox\" class=\"sev_check\"><label for=\"option" + i + "\" class=\"hover-to-big\">" + value + "</label></div>");
                        i++;
                    }
                });
            }
        });
    });
});