$(document).ready(function(){
    // $.get("receiver.php", function(data){
    //     alert(data);
    //     $('#container').html(data);
    // });
    // alert("hi");
    var val=0;
    var arr;
    $.ajax({

        url: "quiz-question.php",
        type: 'post',
        cache:false,
        dataType: 'html',
        // data:{val:val},
        success: function (data) {
             arr = JSON.parse(data);
             var temp=arr[0];
            $('#next').removeAttr('disabled');

            $('#previous').removeAttr('disabled');
            i=0;
            $("div.options form").empty();
            $.each(temp, function (key, value) {
                if (key!="question" && key!="end" && key!="start") {
                    $("div.options form").append("<div class=\"inputGroup\"><input id=\"option" + i + "\" name=\"option" + i + "\" type=\"checkbox\" class=\"sev_check\"><label for=\"option" + i + "\" class=\"hover-to-big\">" + value + "</label></div>");


                }else if(key=="end" && value=="true"){
                    $('#next').attr('disabled','disabled');
                }else if(key=="start" && value=="true"){
                    $('#previous').attr('disabled','disabled');
                    alert("start");
                }else{
                    $.each(value,function (key,value) {

                        $('.question-header').html(value);

                    });

                }
                i++;
            });
        },
}),
    $var=1;
    $('.submit-ans-btn').click(function() {

        if ($(this).text() == "Previous") {
            val--;
            // alert(val);
        } else if ($(this).text() == "Next") {
            val++;
        }
        // $.ajax({
        //
        //     url: "quiz-question.php",
        //     type: 'post',
        //     dataType: 'html',
        //     cache:false,
        //     data:{val:val},
        //     success: function (data) {
        $('#next').removeAttr('disabled');

        $('#previous').removeAttr('disabled');
        // var arr = JSON.parse(data);
        var temp = arr[val];
        $('.question-header').html(arr.key);
        i = 0;
        $("div.options form").empty();
        $.each(temp, function (key, value) {
            if (key != "question" && key != "end" && key != "start") {
                $("div.options form").append("<div class=\"inputGroup\"><input id=\"option" + i + "\" name=\"option" + i + "\" type=\"checkbox\" class=\"sev_check\"><label for=\"option" + i + "\" class=\"hover-to-big\">" + value + "</label></div>");


            } else if (key == "end" && value == "true") {
                $('#next').attr('disabled', 'disabled');
            } else if (key == "start" && value == "true") {
                $('#previous').attr('disabled', 'disabled');
            } else {
                $.each(value, function (key, value) {

                    $('.question-header').html(value);

                });


            }

            i++;


        });
    });
        // });
    // });
});