<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="" >
	<meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
	<meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
	<meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
	<meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Page Title -->
	<title>Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd</title>
	
	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('backend/images/favicon.png')}}">
	
	<!-- All StyleSheet -->
	<link href="{{asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	
	<!-- Globle CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

	<!-- Datatable -->
    <link href="{{asset('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

	{{-- Toaster notification --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

      


        @include('tenant.body.header')
        @include('tenant.body.sidebar')

        @yield('tenant-main')

          <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2023</p>
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



        
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
{{-- Toaster notification --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<script src="{{asset('backend/vendor/global/global.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('backend/vendor/apexchart/apexchart.js')}}"></script>
<script src="{{asset('backend/vendor/chartjs/chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('backend/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Dashboard 1 -->
<script src="{{asset('backend/js/dashboard/dashboard-1.js')}}"></script>

<script src="{{asset('backend/vendor/owl-carousel/owl.carousel.js')}}"></script>

<script src="{{asset('backend/js/custom.min.js')}}"></script>
<script src="{{asset('backend/js/dlabnav-init.js')}}"></script>


<!-- Datatable -->
<script src="{{asset('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/plugins-init/datatables.init.js')}}"></script>
================================================

	=========================Add Sweetalert =======================
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	
	 <script src="{{ asset('backend/custom/js/code.js') }}"></script>
<script>
function JobickCarousel()
	{

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.front-view-slider').owlCarousel({
			loop:false,
			margin:30,
			nav:true,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			autoWidth:true,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: false,
			animateOut: 'fadeOut',
			dots:true,
			navText: ['', ''],
			responsive:{
				0:{
					items:1,
					
					margin:10
				},
				
				480:{
					items:1
				},			
				
				767:{
					items:3
				},
				1750:{
					items:3
				}
			}
		})
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			JobickCarousel();
		}, 1000); 
	});
</script>
</body>
</html>