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

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    $user_name=$_SESSION['username'];

    $sql="SELECT * FROM payment WHERE student_name = '$user_name'";;
    $result=mysqli_query($data,$sql);


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
		
        <center>
		<h1>Your Semester Fee Details</h1>

        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Transaction ID</th>
                <th style="padding: 20px; font-size: 15px;">Semester</th>
                <th style="padding: 20px; font-size: 15px;">Amount</th>
                <th style="padding: 20px; font-size: 15px;">Payment</th>

            </tr>

            <?php
            while($info= $result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['transaction_id']}"; ?>
                </td>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['semester']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['amount']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "<a class='btn btn-warning' href='pay_fee.php?ac_name={$info['student_name']}'>Pay Fee</a>"; ?>
                </td>
                
            </tr>
            <?php
            }
            ?>

        </table>
        </center>

    </div>

</body>
</html>