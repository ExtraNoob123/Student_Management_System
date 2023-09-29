<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }


    elseif($_SESSION['usertype']!='student')
    {
        header("location: login.php");
    }



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    
    <?php

	include 'student_css.php'

	?>

</head>

<body>

	<?php

	include 'student_sidebar.php'

	?>
    <div class="content">
        
        <h1>Welcome to Student Dashboard</h1>
    </div>

</body>
</html>