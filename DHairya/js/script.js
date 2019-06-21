$(document).ready(function(){
        $(".gist").text($(".gist").text().substring(0 , 40) + " ................");
});

$(function () {
        $('.sev_check').click(function(e) {
                $('.sev_check').not(this).prop('checked', false);
        });
});