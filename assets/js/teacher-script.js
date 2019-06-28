$(document).ready(function () {

    // $('select').selectize({});

    $('select').on('change',function() {
        alert();
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: 'include_once "../../helper/ajax/AjaxHelper.php?call=getBatches()";',
            data: {'class_id': id},
            success: function (data) {
                $('select.batch').html(data);
            }
        });
    });

});