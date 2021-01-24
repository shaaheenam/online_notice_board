<?php

session_start();
$conn = mysqli_connect('localhost','root','','onb');

if(isset($_POST['update']))
{
        
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];


        $sql = mysqli_query($conn, "update user set name='$name',dob='$dob',address='$address',mobile='$mobile',email='$email',gender='$gender' where rollnumber='".$_SESSION['user']."'");

        //$check = mysqli_query($conn,"select * from user where rollnumber='".$_SESSION['user']."'");
        //$res = mysqli_fetch_assoc($check);

    if (mysqli_query($conn, $sql)) 
    {
		header('Location: user_p.html');
    }else 
    {
		echo 'query error: ' . mysqli_error($conn);
	}
}

?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
    <title>Profile Updation Successful</title>
</head>
<body>
    <div class="wrapper">
        <h3>Updation Succesccful</h3>
        <br>
        <a href="user_p.html">Go Back</a>
    </div>
</body>
</html>
-->