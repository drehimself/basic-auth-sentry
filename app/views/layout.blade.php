<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Title</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="images/icons/favicon.ico">
	<link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-114x114.png">
</head>
<body>

	<header>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/register">Register</a></li>

			@if (Auth::guest())
				<li><a href="/login">Login</a></li>
			@else
				<li><a href="/logout">Logout</a></li>
			@endif
		</ul>
	</header>

	<div class="container">
		@yield('content')
	</div>


</body>
</html>