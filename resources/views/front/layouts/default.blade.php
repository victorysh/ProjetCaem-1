<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">


	<!--HEAD-->
	@include('front.includes.head')
	<!-------->


	<body>

		<!--HEADER :-->
		@include('front.includes.header')
		<!------------>


		<!--MAIN CONTENT :-->
		@yield('pageContent')
		<!------------------>


		<!-- FOOTER : -->
		@include('front.includes.footer')
		<!------------>


		<!--SCRIPT :-->
		@include('front.includes.script')
		<!------------>

	</body>

</html>
