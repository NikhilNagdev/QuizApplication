$(window).on("load", function() {      //Do the code in the {}s when the window has loaded
    $(".loader-wrapper").fadeOut("slow");  //Fade out the #loader div
});

$(document).ready(function () {

    var modalBtn = $('a.modal-class');
    var modal = $('#myModal');
    var wrapper = $('.wrapper');

    modalBtn.on('click', function () {
        modal.addClass("bounceIn");
        modal.modal({backdrop: true});
        wrapper.addClass("blur");
    });

    modal.on('show.bs.modal', function () {
        var closeModalBtns = modal.find('button[data-custom-dismiss="modal"]');
        closeModalBtns.on('click', function () {
            modal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (evt) {
                modal.modal('hide');
                wrapper.removeClass("blur");
            });
            modal.removeClass("bounceIn").addClass("bounceOut");
        })
    })

    modal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = modal.find('button[data-custom-dismiss="modal"]');
        modal.removeClass("bounceOut");
        modal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
        closeModalBtns.off('click')
        $('select.chapter-select').html("<option value=\"\" selected disabled hidden>Please select subject first</option>");
        $('select.chapter-select').attr("disabled", "true");
        $('select.subject-select').val("hello");
    })

    //Datatable
    $('#view-all-quizzes').dataTable({
        "order": [[ 3, 'desc' ]],
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 4 },
            { "orderable": false, "targets": 6 }
        ]
    });

    $('select.subject-select').on('change',function() {
        var id = $(this).val();
        $('select.chapter-select').removeAttr("disabled");
        $.ajax({
            method: 'GET',
            url: '../../helper/ajax/chapters.php',
            data: {'subject_id': id},
            success: function (data) {
                $('select.chapter-select').html(data);
            }
        });
    });
    // $('select.subject-select').selectize({});


});