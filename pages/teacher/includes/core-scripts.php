
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
//
//
   var totalIncomeChart = document.getElementById('statisticsChart').getContext('2d');

   var mytotalIncomeChart = new Chart(totalIncomeChart, {
       type: 'bar',
       data: {
           labels: ["Subject 1", "Subject 1", "Subject 1", "Subject 1", "Subject 1"],
           datasets : [{
               label: "Total Generated Quiz",
               backgroundColor: '#ff9e27',
               borderColor: 'rgb(23, 125, 255)',
               data: [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10],
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
                       display: true //this will remove only the label
                   },
                   gridLines : {
                       drawBorder: false,
                       display : true
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