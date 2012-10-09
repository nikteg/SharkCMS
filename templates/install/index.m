<!DOCTYPE html>
<html dir="ltr" lang="{{lang}}">
<head>
	<meta charset="{{charset}}">
	<title>{{title}}</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link href="css/style.css" rel="stylesheet">
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<h1>{{title}}</h1>
	{{^complete}}
		<form method="post">
			<p>Site name: <input type="text" name="{{form_elements.sitename}}"></p>
			<p>Welcome to the installer! Press here to complete: <a href="?complete">Complete!</a></p>
			<p><input type="submit" name="{{form_elements.install}}" value="Install"></p>
		</form>
	{{/complete}}
	{{#complete}}
		<p>{{title}} is complete! Make sure to delete the <strong>installer.php</strong> file in the root directory! You may now <a href="index.php">visit your new website</a></p>
	{{/complete}}
</body>
</html>