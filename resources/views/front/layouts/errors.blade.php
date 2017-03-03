<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">


	<!--HEAD-->
	@include('front.includes.head')
	<!-------->


	<body>
		<!--MAIN CONTENT :-->
		@yield('pageContent')
		<!------------------>
	</body>

</html>
