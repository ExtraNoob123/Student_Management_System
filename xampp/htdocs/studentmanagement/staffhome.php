
<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']!='staff')
    {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Staff Dashboard</title>

    
    <?php

    include 'staff_css.php'

    ?>

</head>

<body>

    <?php

    include 'staff_sidebar.php'

    ?>

    <div class="content">
		
		<h1>Welcome to Staff Dashboard</h1>
    </div>
</body>
</html>