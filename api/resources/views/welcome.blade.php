<html>

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

	<h1>PriceCheck Checker API</h1>

	<textarea id="json-str" name="input"></textarea>

	<button id="submit">Submit</button>

	<h2>Result</h2>

	<h3 id="result"></h3>

	<script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>

</body>

</html>
