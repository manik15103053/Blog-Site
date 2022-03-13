<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	@include('frontend.layouts.partial.styles')


	@yield('styles')

</head>
<body >

	@include('frontend.layouts.partial.header')

	@yield('content')


	@include('frontend.layouts.partial.footer')


	<!-- SCIPTS -->

	@include('frontend.layouts.partial.scrypts')

	@yield('scrypts')



</body>
</html>
