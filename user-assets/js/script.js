$(window).on("load", function() {


        setTimeout(function () {
                $(".loader-wrapper").fadeOut("slow");
        }, 2000);


        // $(".gist").text($(".gist").text().substring(0 , 40) + " ................");

        $("#next").on("click", function(){
                $.ajax({
                        method: "GET",
                        url: "includes/multi-choice.php",
                        data: { name: "John", location: "Boston" },
                        dataType: "json",
                        success: function (){
                                alert("etrt");
                        }
                });
        });


        $("div[left-question]").on("click", function () {
                alert($("a.question-text").text());
                $("p.question-header").html($("a.question-text").text());
        });

        $(function () {
                $('.sev_check').click(function(e) {
                        $('.sev_check').not(this).prop('checked', false);
                });
        });

});

$(document).ready(function(){


});

