<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 HTML Template by Colorlib</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h3>@yield('title')</h3>
				<h1>@yield('code')</h1>
			</div>
			<h2>@yield('message')</h2>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
