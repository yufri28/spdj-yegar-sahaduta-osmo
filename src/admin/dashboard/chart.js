var ctx = document.getElementById('myLineChart')
    // eslint-disable-next-line no-unused-vars
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            '2013',
            '2014',
            '2015',
            '2016',
            '2017',
            '2018',
            '2019'
        ],
        datasets: [{
            data: [
                213,
                321,
                322,
                324,
                325,
                327,
                400
            ],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        },
        plugins: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Jumlah jemaat per periode'
            }
        }
    }
});
// pie chart
var ctx = document.getElementById('myPieChart')
    // eslint-disable-next-line no-unused-vars
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        // label nama setiap Value
        labels: [
            'Rayon I',
            'Rayon II',
            'Rayon III',
            'Rayon IV',
            'Rayon V',
            'Rayon VI',
            'Rayon VII',
            'Rayon VIII',
            'Rayon IX',
            'Rayon X',
        ],
        datasets: [{
            // Jumlah Value yang ditampilkan
            data: [60, 60, 60, 80, 40, 23, 21, 43, 23, 21],
            backgroundColor: [
                '#1fab89',
                '#e23e57',
                '#d2f6fc',
                '#46b3e6',
                '#ffb99a',
                '#163172',
                '#88304e',
                '#62d2a2',
                '#9df3c4',
                '#300065',
            ]
        }],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Jumlah jemaat per rayon'
            }
        }
    }
});