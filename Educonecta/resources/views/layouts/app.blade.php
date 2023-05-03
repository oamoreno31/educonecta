<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="/UProyecto/Educonecta/public/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/UProyecto/Educonecta/public/assets/img/favicon.png">

    <title>Educonecta</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="/UProyecto/Educonecta/public/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/UProyecto/Educonecta/public/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/UProyecto/Educonecta/public/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="/UProyecto/Educonecta/public/assets/css/educontecta.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="/UProyecto/Educonecta/public/assets/css/soft-design-system.css?v=1.0.9" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-grid.min.css" integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-grid.rtl.min.css" integrity="sha512-TVEh7Wv2VL7denA2jjLclu/YHda8TiwmLZBhUqmJa+PVhIgbOs4mkx4nGQw+ok1f+3tf/NpbVDIuPKIHcSyEhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-reboot.min.css" integrity="sha512-IS8Z2ZgFvTz/yLxE6H07ip/Ad+yAGswoD1VliOeC2T4WaPFNPC1TwmQ5zomGS+syaR2oO3aXJGKaHv21Dspx0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-reboot.rtl.min.css" integrity="sha512-MWXegIfPaJ2ht1ccssKjDqUk4DDiTyoKQqb4zGNEAXqUfP8ukuEtxraKdo7nko3m+4mY+ZXlPOUX6y4SV0VXPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-utilities.min.css" integrity="sha512-DEGBrwaCF4lkKzMKNwt8Qe/V54bmJctk7I1HyfINGAIugDvsdBeuWzAWZmXAmm49P6EBfl/OeUM01U3r7cW4jg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-utilities.rtl.min.css" integrity="sha512-1W/oJs3Mky37ftCexP/qGfEA5rEjkxtZb6dbxfqr2lGUSJzbrqYkIPZPrQdrsnZbH0Rj9Y6nsxyp4mgmvGbZew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.rtl.min.css" integrity="sha512-tC3gnye8BsHmrW3eRP3Nrj/bs+CSVUfzkjOlfLNrfvcbKXFxk5+b8dQCZi9rgVFjDudwipXfqEhsKMMgRZGCDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body class="index-page">
    @extends('layouts.footer_template')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <main style="margin-top:100px;">@yield('content')</main>
            </div>
        </div>
    </div>
    @extends('layouts.template')
    @section('page_title','Educonecta')

    <!--   Core JS Files   -->
    <!-- <script src="/UProyecto/Educonecta/public/assets/js/core/popper.min.js" type="text/javascript"></script> -->
    
    <!-- <script src="/UProyecto/Educonecta/public/assets/js/core/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="/UProyecto/Educonecta/public/assets/js/plugins/perfect-scrollbar.min.js"></script>

    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="/UProyecto/Educonecta/public/assets/js/plugins/countup.min.js"></script>

    <script src="/UProyecto/Educonecta/public/assets/js/plugins/choices.min.js"></script>

    <script src="/UProyecto/Educonecta/public/assets/js/plugins/prism.min.js"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="/UProyecto/Educonecta/public/assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="/UProyecto/Educonecta/public/assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="/UProyecto/Educonecta/public/assets/js/plugins/choices.min.js"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="/UProyecto/Educonecta/public/assets/js/plugins/parallax.min.js"></script>

    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="/UProyecto/Educonecta/public/assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
    </script>
</body>

</html>