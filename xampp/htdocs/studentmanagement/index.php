
<?php
	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['message'])
	{
		$message= $_SESSION['message'];
		echo "<script type='text/javascript'>
			alert('$message');
		</script>";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <nav>
		<label class="logo">Student Management</label>

		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">Admission</a></li>
			<li><a href="view_noticeboard.php">Noticeboard</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>

    <div class="section1">
		<img class="main_img" src="sms.jpg">
	</div>

    <center>
		<h1 class="adm">Admission Form</h1>

	</center>

    <div align="center" class="admission_form">

		<form action="admission_data_check.php" method="POST">
			
		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="name">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="email">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="text" name="phone">
		</div>

		<div class="adm_int" >	
			<input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply" >
		</div>


		</form>
		
	</div>

    <footer>
		<h3></h3>
	</footer>


</body>
</html>