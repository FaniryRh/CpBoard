<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body id="app-layout">
	<div id="wrapper">
    	@include('partials._navbar')
        @yield('content')
    </div>
    	@include('partials._footer')
    	@include('partials._javascripts')

</body>
</html>
