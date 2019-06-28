$(document).ready(function () {

    // $('select').selectize({});

    $('select.quiz-class').on('change',function() {
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getBatches()',
            data: {'class_id': id},
            success: function (data) {
                alert(data);
                $('select.quiz-batch').html(data);
            }
        });
    });


    $('select.quiz-batch').on('change',function() {
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getSubjects()',
            data: {'batch_id': id},
            success: function (data) {
                alert(data);
                $('select.quiz-subject').html(data);
            }
        });
    });

    $('select.quiz-subject').on('change',function() {
        var id = $(this).val();
        $('select.quiz-chapter').removeAttr("disabled");
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getChapters()',
            data: {'subject_id': id},
            success: function (data) {
                $('select.quiz-chapter').html(data);
            }
        });
    });

});