$(document).ready(function () {

    /**********************************************/
    //*****************LOADER****************************
    /**********************************************/

    $(".loader-wrapper").fadeOut("slow");

    /**********************************************/
    //*****************LOADER****************************
    /**********************************************/



    var wrapper = $('.wrapper');
    var marks = 0;

    var stuudentTable = $('table.view-all-students').dataTable({
        "columnDefs": [
            {"orderable": false, "targets": 4}
        ]
    });

    var batchTable = $('table.view-all-batches').dataTable({
        "columnDefs": [
            {"orderable": false, "targets": 3}
        ]
    });


    /*********************************************************************/
    //*********************ADD QUESTION MODAL*****************************
    /*********************************************************************/
    var question_modal = $('#add-questions-modal');
    $('a#add-questions').on('click', function () {

        question_modal.addClass("bounceIn");
        question_modal.modal({backdrop: true});
        wrapper.addClass("blur");

    });

    question_modal.on('show.bs.modal', function () {
        var closeModalBtns = question_modal.find('button[data-custom-dismiss="modal"]');
        closeModalBtns.on('click', function () {
            question_modal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (evt) {
                question_modal.modal('hide');
                wrapper.removeClass("blur");
            });
            question_modal.removeClass("bounceIn").addClass("bounceOut");
        })
    });

    question_modal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = question_modal.find('button[data-custom-dismiss="modal"]');
        question_modal.removeClass("bounceOut");
        question_modal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
        closeModalBtns.off('click');
    });

    $('#view-all-drafted-quizzes').dataTable({
        columnDefs: [
            {"orderable": false, "targets": 4}
        ],
    });

    $("input#select-quiz-id").change(function () {
        if (this.checked) {
            $('input#select-quiz-id').prop('checked', false);
            $(this).prop('checked', true);
        }
    });

    $('button#select-quiz-submit').on('click', function (e) {
        if (!($('input#select-quiz-id').is(':checked'))) {
            e.preventDefault();
            swal("Please select a quiz first", {
                icon: "warning",
                buttons: {
                    confirm: {
                        className: 'btn btn-warning'
                    }
                },
            });
        }
    });

    /*********************************************************************/
    //*********************END OF ADD QUESTION MODAL***********************
    /*********************************************************************/


    /*********************************************************************/
    //*********************ADD QUESTION************************************
    /*********************************************************************/
    var questionsTable = $('table.view-all-manual-questions').DataTable({
        columnDefs: [
            {"orderable": false, "targets": 4}
        ],
    });


    $('table.view-all-manual-questions tbody').on('click', 'tr td input', function (event) {

        var rowMarks = parseInt($(event.target).parent().parent().find('td').eq(3).text());
        if ($(this).prop('checked') != true) {
            $(this).prop('checked', false);
            setCheckbox($(this).val(), false);
            alert($(this).val());
            if (marks - rowMarks >= 0)
                marks = marks - rowMarks;
            $('span.marks-text').html(marks);
        } else {
            $(this).prop('checked', true);
            // alert($(this).find('input').val());
            setCheckbox($(this).val(), true);
            if (marks + rowMarks >= 0)
                marks = marks + rowMarks;
            $('span.marks-text').html(marks);
        }
        console.log(marks);

    });

    $('input.select-all-question-ids').on('change', function () {

        if (this.checked) {
            // alert();
            questionsTable.rows().every(function(rowIdx) {
                var col = questionsTable.cell( rowIdx, 4).data().slice(0,-1) + " checked=true>";
                // alert(col);
                questionsTable.cell( rowIdx, 4).data(col).draw();
            });

            $('input.select-all-question-id').prop("checked", true);


            $('span.marks-text').html($('input#total-question-marks').val());
            marks = parseInt($('input#total-question-marks').val());
        } else {
            $('input.select-all-question-id').prop("checked", false);
            $('input.select-question-id').prop("checked", false);
            $('span.marks-text').html(0);
            marks = 0;
        }

    });

    function setCheckbox(value, status) {
        alert(status);
        alert($("input[name='questionIds[]'][value=" + value + "]").prop('checked'));
        $("input[name='questionIds[]'][value=" + value + "]").prop('checked', status);
    }



    /*********************************************************************/
    //*********************END OF ADD QUESTION******************************
    /*********************************************************************/


    var retestId = 0;
    var retestModal = $('#retest-ref-modal');
    $('#quiz-type').on('change', function () {
        var id = $(this).val();
        if (parseInt(id) === 2) {
            // $('div.retest-red-id').html("<a href=\"\">Add retest reference ID</a>");
            retestModal = $('#retest-ref-modal');
            retestModal.addClass("bounceIn");
            retestModal.modal({backdrop: true});
            wrapper.addClass("blur");

        } else if (parseInt(id) === 1) {
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

    var modalBtn = $('button.add-students');
    var modal = $('#myModal');
    var wrapper = $('.wrapper');

    /*********************************************************************/
    //*********************RETEST REF MODAL******************************
    /*********************************************************************/

    $('#submit-retest-modal').click(function () {


        var quizSelected = $('#retest-ref-id-value').val();
        retestId = quizSelected;

        if(null == retestId){
            alert("Please select a quiz first");
        }else{
            $("div.retest-ref-id input").val(quizSelected);
            $("div.retest-ref-id").append("Your retest reference quiz is " + $('option[value=\'' + quizSelected + '\']').text());
        }

    });

    /*********************************************************************/
    //*********************END OF RETEST REF MODAL******************************
    /*********************************************************************/

    /*********************************************************************/
    //*********************QUIZ REPORTS******************************
    /*********************************************************************/

    $('a#quiz-reports').on('click', function () {
        alert();
        $('#quiz-reports-modal').modal({backdrop: true});

    });

    /*********************************************************************/
    //*********************END OF QUIZ REPORTS******************************
    /*********************************************************************/

    /********************************************************************/
    //JS CHART FUNCTIONS
    /********************************************************************/
    function addCircle(circleNo, maxValue, marks, color) {
        alert("helllo");
        console.log("fgdfgfdg");
        Circles.create({
            id: 'circles-' + circleNo,
            radius: 45,
            value: marks,
            maxValue: maxValue,
            width: 7,
            text: marks + "/" + maxValue,
            colors: ['#F1F1F1', color],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true,
            fontSize: 1,
        });
        window.alert("hekki");
    }

    function addLineChart(quizCreated){
        alert("helllo");
        var lineChart = document.getElementById('totalIncomeChart').getContext('2d');
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Quiz Created",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10]
                }]
            },
            options : {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    // position: 'bottom',
                    // labels : {
                    //     padding: 10,
                    //     fontColor: '#1d7af3',
                    // }
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode:"nearest",
                    intersect: 0,
                    position:"nearest",
                    xPadding:10,
                    yPadding:10,
                    caretPadding:10
                },
                layout:{
                    padding:{left:15,right:15,top:15,bottom:15}
                }
            }
        });
    }
    /********************************************************************/
    //END OF JS CHART FUNCTIONS
    /********************************************************************/

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
        studentDT.on("click", "button", function () {
            // var row = $(this).parents('tr');
            // // alert(studentDT.fnGetData(this));
            // var add = $(this).parents('tr');
            // var r =studentDT.row(add);
            // studentDT.row.add(add.data()).draw();
            studentDT.row($(this).parents('tr')).remove().draw(false);

        });

        $("button.proceed").click(function () {
            var studentId = [];
            $.each($("input[name='student_id']:checked"), function () {
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
        modal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
        closeModalBtns.off('click');
    });


    $('table.view-all-quizzes').dataTable({});



    $('select#quiz-subject').selectize();
    // $('select#quiz-subject')[0].selectize.disable();
//     $('select#quiz-subject')[0].selectize.enable();
    $('select#quiz-difficulty').selectize();
    $('select#quiz-type').selectize();
    $('select#group-type').selectize();
    $('input.datetime').datetimepicker({
        widgetPositioning: {horizontal: "auto", vertical: "bottom"},
        format: 'YYYY-MM-DD HH:mm:ss',
    });
    $('input.time').datetimepicker({
        widgetPositioning: {horizontal: "auto", vertical: "bottom"},
        format: 'LT',
    });

    $('select.quiz-class').on('change', function () {
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


    $('select.quiz-batch').on('change', function () {
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getSubjects()',
            data: {'batch_id': id},
            success: function (data) {
                $('select.quiz-subject').html(data);
            }
        });
    });

    var $select = $('select#quiz-chapter').selectize();
    $('select#quiz-chapter')[0].selectize.disable();
    var selectize = $select[0].selectize;

    $('select#quiz-subject').on('change', function () {
        var id = $(this).val();
        $('select.quiz-chapter').removeAttr("disabled");
        $.ajax({
            method: 'POST',
            url: '../../helper/ajax/AjaxHelper.php?call=getChapters()',
            data: {'subject_id': id},
            success: function (dataobj) {
                selectize.clearOptions();
                selectize.addOption(JSON.parse(dataobj));
                $('select#quiz-chapter')[0].selectize.enable();
            }
        });
    });




});
//
// $('table.view-all-manual-questions').DataTable({
//
// });
//
// $('input.select-all-question-ids').on('change', function () {
//     alert();
//     //Get the table
//     var table = $('table.view-all-manual-questions').DataTable();
//     //Iterate over selected rows
//     var rowData = table.rows().every(function(rowIdx) {
//         var colIdx = 4; // startDate is the fifth column, or "4" from 0-base  (0,1,2,3,4...)
//         table.cell( rowIdx, colIdx).data('01/01/2017').draw();
//     });
//     //Re-draw the table
//     //table.draw();
// });