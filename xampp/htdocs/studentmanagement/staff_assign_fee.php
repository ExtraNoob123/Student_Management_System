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

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    $sql_students = "SELECT * FROM user WHERE usertype='student'";
    $result_students = mysqli_query($data,$sql_students);

    if(isset($_POST['assign_fee']))
    {
	    $trans_id=$_POST['trans_id'];
        $student_name=$_POST['student_name'];
        $semester=$_POST['semester'];
        $amount=$_POST['amount'];
        $pay_update="unpaid";

        $check="SELECT * from payment WHERE transaction_id='$trans_id'";
        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
            echo "<script type='text/javascript'>
			    alert('Transaction already assigned');
		        </script>"; 
        }
        else
        {

            $sql= "INSERT INTO payment(transaction_id,student_name,semester,amount,pay_update) VALUES 
            ('$trans_id','$student_name','$semester','$amount','$pay_update')";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
			    alert('Fee Assigned Succesfully');
		        </script>";
            }
            else
            {
                echo "<script type='text/javascript'>
			    alert('Task Failed');
		        </script>";  
            }
        }
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
    <title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

    <style type="text/css">
		
		label
		{

		display: inline-block;
		text-align: right;
		width: 100px;
		padding-top: 10px;
		padding-bottom: 10px;

		}

		.div_deg
		{
			background-color: skyblue;
			width: 500px;
			padding-top: 70px;
			padding-bottom: 70px;
		}
	</style>
</head>

<body>
    <?php

    include 'staff_sidebar.php'

    ?>

    <div class="content">
		
        <center>
		<h1>Enter Semester Fee Details</h1>

        <div class="div_deg">
            <form action="#" method="POST" >
                <div>
			        <label >Transaction_Id:</label>
			        <input type="text" name="trans_id">
		        </div>

                <div>
			        <label for="student_name">Student Username:</label>
			        <select name="student_name">
                    <?php while ($row = $result_students->fetch_assoc()) { ?>
                        <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                    <?php } ?>
                    </select>
		        </div>

                <div>
			        <label >Semester:</label>
			        <input type="text" name="semester">
		        </div>

                <div>
			        <label >Amount:</label>
			        <input type="number" name="amount">
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="assign_fee" value="Assign Fee">
		        </div>

            </form>
        </div>
        </center>

    </div>
</body>
</html>