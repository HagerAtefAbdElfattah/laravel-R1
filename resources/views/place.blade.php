<!doctype html>
<html class="no-js" lang="en">
 
@include('includes.head')
	
	<body>
		<!--header-top start -->
		@include('includes.header')
		<!--header-top end -->

		<!-- top-area Start -->
		@include('includes.topArea')
		<!-- top-area End -->

		<!--welcome-hero start -->
		@include('includes.welcome')
		<!--welcome-hero end -->

		<!--list-topics start -->
		@include('includes.listTopic')
		<!--list-topics end-->

		<!--works start -->
		@include('includes.works')
		<!--works end -->

		<!--explore start -->
		@include('includes.explore')
		<!--explore end -->

		<!--reviews start -->
		@include('includes.reviews')
		<!--reviews end -->

		<!-- statistics strat -->
		@include('includes.statistics')
		<!-- statistics end -->

		<!--blog start -->
		@include('includes.blog')
		<!--blog end -->

		<!--subscription strat -->
		@include('includes.subscription')
		<!--subscription end -->

		<!--footer start-->
		@include('includes.footer')
		<!--footer end-->
        
		@include('includes.footerJS')
    </body>
	
</html>