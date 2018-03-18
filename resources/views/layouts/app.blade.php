<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<style>
	html {
		background: url(/img/bg.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}


	html {
		position: relative;
		min-height: 100%;
	}

	.footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 60px;
		background-color: #f5f5f5;
		color: #FFFFFF;
	}
</style>

<body id="app-layout" style="background: url(/img/bg.png) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;">
@include('partials._navbar')
	<div id="wrapper" style="background: url(/img/bg.png) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		margin-top: 70px;
		margin-bottom: 70px;
		">

        @yield('content')
    </div>
    	@include('partials._footer')
    	@include('partials._javascripts')

</body>
</html>
