
<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']!='teacher')
    {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>

    
    <?php

	include 'teacher_css.php'

	?>

</head>

<body>

	<?php

	include 'teacher_sidebar.php'

	?>

    <div class="content">
		
		<h1>Welcome to Teacher Dashboard</h1>
    </div>
</body>
</html>