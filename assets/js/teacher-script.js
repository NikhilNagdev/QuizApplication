
$(document).ready(function () {

    $(".loader-wrapper").fadeOut("slow");

    $('table.view-all-students').dataTable({
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ]
    });

    $('table.view-all-batches').dataTable({
        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ]
    });


    $("input.select-all-batch-ids").change(function() {
        if(this.checked) {
            $('input.select-batch-id').prop('checked', true);
        }else{
            $('input.select-batch-id').prop('checked', false);
        }
    });

    var modalBtn = $('button.add-students');
    var modal = $('#myModal');
    var wrapper = $('.wrapper');



    var retestModal = $('#retest-ref-modal');
    $('#quiz-type').on('change', function(){
        var id = $(this).val();
        if(parseInt(id)===2){
            // $('div.retest-red-id').html("<a href=\"\">Add retest reference ID</a>");
            retestModal = $('#retest-ref-modal');
            retestModal.addClass("bounceIn");
            retestModal.modal({backdrop: true});
            wrapper.addClass("blur");

        }
        else if(parseInt(id)===1){
            $('div.retest-red-id').html("");
        }
    });

    retestModal.on('show.bs.modal', function () {
        var closeModalBtns = retestModal.find('button[data-custom-dismiss="modal"]');
        closeModalBtns.on('click', function () {
            retestModal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (evt) {
                retestModal.modal('hide');
                wrapper.removeClass("blur");
            });
            retestModal.removeClass("bounceIn").addClass("bounceOut");
        })
    });

    retestModal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = retestModal.find('button[data-custom-dismiss="modal"]');
        retestModal.removeClass("bounceOut");
        retestModal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
        closeModalBtns.off('click');
    });

    modalBtn.on('click', function () {
        modal.addClass("bounceIn");
        modal.modal({backdrop: true});
        wrapper.addClass("blur");
        var classIds = $('select.quiz-class').val();
        // alert(classIds);
        // $.ajax({
        //     method: 'POST',
        //     url: '../../helper/ajax/AjaxHelper.php?call=getStudents()',
        //     data: {classIds},
        //     success: function (data) {
        //         alert(data);
        //         // $('tbody').html(data);
        //         $('#view-all-students').dataTable({
        //             // columns: [
        //             //     { data: 'student_id' },
        //             //     { data: 'name' },
        //             //     { data: 'class_name' },
        //             //     { data: 'batch_name' },
        //             // ],
        //             "destroy": true,
        //             // "serverSide":true,
        //         });
        //     }
        // });

        // var studentDT = $('#view-all-students').DataTable({
        //     // "processing": true,
        //     // "serverSide":true,
        //     // retrieve: true,
        //     "destroy": true,
        //     "ajax":{
        //         url:"../../helper/ajax/AjaxHelper.php?call=getStudents()",
        //         data: {classIds},
        //         type:"post",
        //     },
        //     columns: [
        //         { data: 'student_id' },
        //         { data: 'name' },
        //         { data: 'class_name' },
        //         { data: 'batch_name' },
        //         { data: 'add' },
        //     ],
        //     "columnDefs": [
        //         { "orderable": false, "targets": 4 }
        //     ],
        // });
        studentDT.on("click", "button", function(){
            // var row = $(this).parents('tr');
            // // alert(studentDT.fnGetData(this));
            // var add = $(this).parents('tr');
            // var r =studentDT.row(add);
            // studentDT.row.add(add.data()).draw();
            studentDT.row($(this).parents('tr')).remove().draw(false);

        });

        $("button.proceed").click(function(){
            var studentId = [];
            $.each($("input[name='student_id']:checked"), function(){
                studentId.push($(this).val());
            });
            alert(studentId);

        });
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
    });

    modal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = modal.find('button[data-custom-dismiss="modal"]');
        modal.removeClass("bounceOut");
        modal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
        closeModalBtns.off('click');
    });


    $('table.view-all-quizzes').dataTable({});

    $('#submit-retest-modal').click(function () {
        var quizSelected = $('#retest-ref-id-value').val();

        alert();
        $("div.retest-ref-id input").val(quizSelected);
        $("div.retest-ref-id").append("Your retest reference quiz is " + $('option[value=\''+quizSelected + '\']').text());
    });

    $('select#quiz-subject').selectize();
    $('select#quiz-difficulty').selectize();
    $('select#quiz-type').selectize();
    $('select#group-type').selectize();
    $('input.datetime').datetimepicker({
        widgetPositioning: {horizontal:"auto",vertical:"bottom"},
        format: 'YYYY-MM-DD HH:mm:ss',
    });
    $('input.time').datetimepicker({
        widgetPositioning: {horizontal:"auto",vertical:"bottom"},
        format: 'LT',
    });

    $('select.quiz-class').on('change',function() {
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getBatches()',
            data: {'class_id': id},
            success: function (data) {
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
                $('label>input[type=search]').val("hello");
                $('select.quiz-subject').html(data);
            }
        });
    });

    var $select = $('select#quiz-chapter').selectize();
    var selectize = $select[0].selectize;

    $('select#quiz-subject').on('change',function() {
        var id = $(this).val();
        $('select.quiz-chapter').removeAttr("disabled");
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getChapters()',
            data: {'subject_id': id},
            success: function (dataobj) {
                selectize.clearOptions();
                selectize.addOption(JSON.parse(dataobj));
            }
        });
    });




});