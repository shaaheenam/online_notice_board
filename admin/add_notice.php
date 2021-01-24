<?php

$conn = mysqli_connect('localhost','root','','onb');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

$user_rollno = mysqli_real_escape_string($conn, $_POST['rollnumber']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$details = mysqli_real_escape_string($conn, $_POST['details']);

$sql = "INSERT INTO notice(user_rollno,subject,details) VALUES('$user_rollno','$subject','$details')";

//save to db and check
if(mysqli_query($conn, $sql)){
    //success
    //echo 'success';
    header("location:admin_mn.php");
} else{
    //error
    echo 'query error: ' . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
    <title>Add Notice result</title>
</head>
<body>
    <a href="admin_mn.php">Go Back</a>
</body>
</html>
