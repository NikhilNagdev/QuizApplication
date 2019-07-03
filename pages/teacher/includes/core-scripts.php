
<script src="https://localhost/quizapplication/assets/js/core/jquery.3.2.1.min.js"></script>

<script src="https://localhost/quizapplication/assets/js/core/popper.min.js"></script>

<script src="https://localhost/quizapplication/assets/js/core/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


<!-- jQuery UI -->
<!--<script src="https://localhost/quizapplication/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>-->
<script src="https://localhost/quizapplication/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="https://localhost/quizapplication/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="https://localhost/quizapplication/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="https://localhost/quizapplication/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="https://localhost/quizapplication/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="https://localhost/quizapplication/assets/js/plugin/datatables/datatables.min.js"></script>

<!--DATE AND TIMEPICKER-->
<script src="https://localhost/quizapplication/assets/js/plugin/bootstrap-datetimepicker/moment.min.js" type="text/javascript"></script>
<script src="https://localhost/quizapplication/assets/js/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Notify -->
<script src="https://localhost/quizapplication/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>


<script src="https://localhost/quizapplication/assets/js/plugin/selectize/selectize.min.js"></script>

<!-- Sweet Alert -->
<script src="https://localhost/quizapplication/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="https://localhost/quizapplication/assets/js/atlantis.min.js"></script>

<!-- OUR SCRIPT-->
<script src="https://localhost/quizapplication/assets/js/teacher-script.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<!--<script src="https://localhost/quizapplication/assets/js/setting-demo.js"></script>-->
<!--<script src="https://localhost/quizapplication/assets/js/demo.js"></script>-->
<script>


    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets : [{
                label: "Total Income",
                backgroundColor: '#ff9e27',
                borderColor: 'rgb(23, 125, 255)',
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }],
                xAxes : [ {
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });




</script>

<script>
    $(document).ready(function() {
        $.notify({
            // options
            icon: 'flaticon-alarm-1',
            title: 'Bootstrap notify',
            message: 'Hello World'
        },{
            // settings
            type: "info",
        });
    });
</script>