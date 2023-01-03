<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>WayFinder</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

            <form method="POST" action="{{ url('create_location') }}" enctype= 'multipart/form-data'>
                @csrf



                <div class="form-group">
                    <input type="text" name="location_name" class="form-control" placeholder="location_name" required autofocus value="{{old('location_name')}}">
                    @error('location_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="location_state" class="form-control" placeholder="location_state" required autofocus value="{{old('location_state')}}">
                    @error('location_state')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="directions" class="form-control" placeholder="directions" required autofocus value="{{old('directions')}}">
                    @error('directions')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                  <input type="file" name="image" class="form-control" value="{{old('directions')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create</button>
                <hr>
                <!-- <p class="text-muted">Don't have an account?</p>
                <a href="register.html" class="btn btn-outline-light btn-sm">Register now!</a> -->
            </form>
   
        </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>