<script src="./js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap5.min.js"></script>
<script src="./js/script.js"></script>
<script src="../../resource/slick-master/slick/slick.min.js"></script>
<script>
$(document).ready(function() {

    // index page
    var indxTotJem = $('.index-total-jemaat');
    var indxKaumBpk = $('.index-kaum-bapak');
    var indxKaumIbu = $('.index-kaum-ibu');
    var indxKaumPemuda = $('.index-pemuda');
    var indxKaumPar = $('.index-par');

    indxTotJem.on('click', function() {
        window.location.href = './kategorial.php';
    });
    indxKaumBpk.on('click', function() {
        window.location.href = './kategorial.php?mod=bapak';
    });
    indxKaumIbu.on('click', function() {
        window.location.href = './kategorial.php?mod=ibu';
    });
    indxKaumPemuda.on('click', function() {
        window.location.href = './kategorial.php?mod=pemuda';
    });
    indxKaumPar.on('click', function() {
        window.location.href = './kategorial.php?mod=par';
    });


    $('.slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });
    // $('.slider').slick({
    //     centerMode: true,
    //     centerPadding: '60px',
    //     slidesToShow: 4,
    //     responsive: [{
    //             breakpoint: 768,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '40px',
    //                 slidesToShow: 3
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '40px',
    //                 slidesToShow: 1
    //             }
    //         }
    //     ]
    // });

    var activePage = $('.judul-page').text();
    console.log('------------------------------------');
    console.log(activePage);
    console.log('------------------------------------');
    var coreActive = $('.core-active');
    var dashboard = $('.dashboard');
    var liActivePage = $('.list-active-page');
    var coreKate =
        "<a href='./kategorial.php' class='nav-link active px-3'><span class='me-2'><i class='bi bi-people'></i></span><span>Kategorial</span></a>";

    if (activePage == 'Kategorial') {
        liActivePage.append(coreKate);
        dashboard.remove();
    }
});
</script>
</body>

</html>