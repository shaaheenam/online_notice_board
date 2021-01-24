<?php
session_start();
$conn = mysqli_connect('localhost','root','','onb');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

extract($_POST);

if(isset($login))
{

    //$pass=md5($password);

        $sql = mysqli_query($conn,"select * from admin where username='$username' and password='$password'");

        $num = mysqli_num_rows($sql);

        if($num == true)
        {
            $_SESSION['admin']=$username;
            header('location:admin_mu.php');
        }
        else
        {
            $err="<font color='red'>Invalid login details</font>";
        }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <p><?php echo @$err;?></p>
</body>
</html>