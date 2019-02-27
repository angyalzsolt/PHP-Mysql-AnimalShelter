<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../../css/login.css">
<body>
<main class="login_main upload_form">
	<div class="wrapper-main">
		<section class="section-default">
			<h1>Login</h1>
			<br>
			<form class="forminput" action="includes_admin/login.inc.php" method="POST">
                         <input class="form-control" type="text" name="mailuid" placeholder="Username/Email...">
                         <input class="form-control" type="password" name="pwd" placeholder="Password...">
                         <button class="btn btn-info" type="submit" name="login-submit">Login</button>
                   </form>
		</section>
	</div>
</main>
</body>
</html>