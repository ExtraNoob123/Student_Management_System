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

    $name=$_SESSION['username'];
    $sql="SELECT * FROM user WHERE username='$name' ";

    $result=mysqli_query($data,$sql);

    $info=mysqli_fetch_assoc($result);

    if(isset($_POST['post_complaint']))
    {   
        $c_usename=$_POST['username'];
        $c_subject=$_POST['subject'];
        $c_description=$_POST['description'];

        $sql= "INSERT INTO complaints(username,com_subject,com_description,date) VALUES 
            ('$c_usename','$c_subject','$c_description', CURDATE())";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
			    alert('Your Complaint Has Been Posted Succesfully');
		        </script>";
            }
            else
            {
                echo "<script type='text/javascript'>
			    alert('Could Not Post Your Complaint');
		        </script>";  
            }
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

	include 'student_sidebar.php'

	?>

    <div class="content">
		
        <center>
		<h1>Post Your Complaint Here</h1>
        <div class="div_deg">
            <form action="#" method="POST" >
                <div>
			        <label >Student Uername:</label>
			        <input type="text" name="username" value="<?php echo "{$info['username']}" ?>">
		        </div>
                <div>
			        <label >Complaint Subject:</label>
			        <input type="text" name="subject">
		        </div>

                <div>
			        <label >About Complaint:</label>
			        <textarea name="description"></textarea>
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="post_complaint" value="Post Complaint">
		        </div>

            </form>
        </div>
        </center>

    </div>

</body>
</html>