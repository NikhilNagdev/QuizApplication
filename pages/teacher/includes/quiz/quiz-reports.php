<hmtl>

    <body>
    <div id="chart-container">
        <canvas id="barChart" width="400" height="400"></canvas>
    </div>
    <script src="../../../../assets/js/plugin/chart.js/chart.min.js"></script>
    <script>
        var barChart = document.getElementById('barChart').getContext('2d');

        var myBarChart = new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ["0-4", "4-8", "8-12", "12-16", "16-20"],
                datasets : [{
                    label: "Students",
                    backgroundColor: 'rgb(23, 125, 255)',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [3, 2, 9, 5, 4],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Students',
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Quiz Marks',
                        }
                    }]
                },
            }
        });
    </script>
    </body>

</hmtl>
