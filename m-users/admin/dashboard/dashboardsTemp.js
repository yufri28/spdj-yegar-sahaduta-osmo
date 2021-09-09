var ctx = document.getElementById("myChart");
// var ctx1 = document.getElementById("myChart1");
// var ctx2 = document.getElementById("myChart2");
// var ctx3 = document.getElementById("myChart3");
// tampilan chart
var piechart = new Chart(ctx, {
    type: 'line',
    data: {
        // label nama setiap Value
        labels: [
            '2012',
            '2013',
            '2014',
            '2015',
            '2016',
            '2017',
            '2018',
            '2019',
            '2020',
            '2021',
        ],
        datasets: [{
            // Jumlah Value yang ditampilkan
            data: [60, 60, 60, 80, 100, 40, 32, 60, 80, 54],
            backgroundColor: [
                'rgba(24, 220, 110, 0.5)',
                'rgba(111, 80, 10, 0.5)',
                'rgba(11, 120, 170, 0.5)',
                'rgba(55, 20, 50, 0.5)',
                'rgba(99, 210, 90, 0.5)',
                'rgba(24, 320, 110, 0.5)',
                'rgba(111, 50, 10, 0.5)',
                'rgba(11, 320, 170, 0.5)',
                'rgba(55, 22, 50, 0.5)',
                'rgba(99, 220, 90, 0.5)'
            ]
        }],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'left',
            },
            title: {
                display: true,
                text: 'Jumlah jemaat di setiap rayon'
            }
        }
    }
});
// var piechart1 = new Chart(ctx1, {
//     type: 'pie',
//     data: {
//         // label nama setiap Value
//         labels: [
//             'Kaum Bapak',
//             'Kaum Ibu',
//             'Pemuda',
//             'PAR',
//             // 'Digital Marketing'
//         ],
//         datasets: [{
//             // Jumlah Value yang ditampilkan
//             data: [60, 60, 60, 80],
//             backgroundColor: [
//                 'rgba(24, 220, 110, 0.5)',
//                 'rgba(111, 80, 10, 0.5)',
//                 'rgba(11, 120, 170, 0.5)',
//                 'rgba(55, 20, 50, 0.5)',
//                 // 'rgba(99, 230, 90, 0.5)'
//             ]
//         }],
//     },
//     options: {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'top',
//             },
//             title: {
//                 display: true,
//                 text: 'Jumlah jemaat per kategori'
//             }
//         }
//     }
// });

// var piechart2 = new Chart(ctx2, {
//     type: 'pie',
//     data: {
//         // label nama setiap Value
//         labels: [
//             'Rayon I',
//             'Rayon II',
//             'Rayon III',
//             'Rayon IV',
//             'Rayon V',
//             'Rayon VI',
//             'Rayon VII',
//             'Rayon VIII',
//             'Rayon IX',
//             'Rayon X',
//         ],
//         datasets: [{
//             // Jumlah Value yang ditampilkan
//             data: [60, 60, 60, 80, 100, 40, 32, 60, 80, 54],
//             backgroundColor: [
//                 'rgba(24, 220, 110, 0.5)',
//                 'rgba(111, 80, 10, 0.5)',
//                 'rgba(11, 120, 170, 0.5)',
//                 'rgba(55, 20, 50, 0.5)',
//                 'rgba(99, 210, 90, 0.5)',
//                 'rgba(24, 320, 110, 0.5)',
//                 'rgba(111, 50, 10, 0.5)',
//                 'rgba(11, 320, 170, 0.5)',
//                 'rgba(55, 22, 50, 0.5)',
//                 'rgba(99, 220, 90, 0.5)'
//             ]
//         }],
//     },
//     options: {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'top',
//             },
//             title: {
//                 display: true,
//                 text: 'Jumlah jemaat di setiap rayon'
//             }
//         }
//     }
// });
// var piechart3 = new Chart(ctx3, {
//     type: 'pie',
//     data: {
//         // label nama setiap Value
//         labels: [
//             'Kaum Bapak',
//             'Kaum Ibu',
//             'Pemuda',
//             'PAR',
//             // 'Digital Marketing'
//         ],
//         datasets: [{
//             // Jumlah Value yang ditampilkan
//             data: [60, 60, 60, 80],
//             backgroundColor: [
//                 'rgba(24, 220, 110, 0.5)',
//                 'rgba(111, 80, 10, 0.5)',
//                 'rgba(11, 120, 170, 0.5)',
//                 'rgba(55, 20, 50, 0.5)',
//                 // 'rgba(99, 230, 90, 0.5)'
//             ]
//         }],
//     },
//     options: {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'top',
//             },
//             title: {
//                 display: true,
//                 text: 'Jumlah jemaat per kategori'
//             }
//         }
//     }
// });