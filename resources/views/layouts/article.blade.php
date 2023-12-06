<!doctype html>
<html class="no-js" lang="en">
 
@include('includes.head')
	
	<body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        
		<!--header-top start -->
		@include('includes.header')
		<!--header-top end -->

		<!-- top-area Start -->
		@include('includes.topArea')
		<!-- top-area End -->

		<!--welcome-hero start -->
		@include('includes.welcome')
		<!--welcome-hero end -->

		<!--Content start -->
		@yield('content')
		<!--Content end-->

		<!--footer start-->
		@include('includes.footer')
		<!--footer end-->

		@include('includes.footerJS')
    </body>
	
</html>