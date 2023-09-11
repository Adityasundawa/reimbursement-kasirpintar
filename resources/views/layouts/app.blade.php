<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kasir Pintar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link rel="stylesheet" href="{{url('/')}}/assets/vendor/chartist/css/chartist.min.css">
    <link href="{{url('/')}}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{url('/')}}/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet">

    <link href="{{url('/')}}/assets/vendor/summernote/summernote.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">

        @include('partials.navbar')

        @yield('content')


        <div class="content-body">
            <!-- row -->

        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{url('/')}}/assets/vendor/global/global.min.js"></script>
	<script src="{{url('/')}}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{url('/')}}/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{url('/')}}/assets/js/custom.min.js"></script>
	<script src="{{url('/')}}/assets/js/deznav-init.js"></script>
	<script src="{{url('/')}}/assets/vendor/owl-carousel/owl.carousel.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{url('/')}}/assets/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="{{url('/')}}/assets/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{url('/')}}/assets/js/dashboard/dashboard-1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
    @include('sweetalert::alert')
	<script>
		function carouselReview(){
			/*  event-bx one function by = owl.carousel.js */
			jQuery('.event-bx').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				center:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
				dots:true,
				responsive:{
					0:{
						items:1
					},
					720:{
						items:2
					},

					1150:{
						items:3
					},

					1200:{
						items:2
					},
					1749:{
						items:3
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>
</body>
</html>
