<?php

session_start();
$conn = mysqli_connect('localhost','root','','onb');

    extract($_POST);
    if(isset($update))
    {

        if($oldpassword=="" || $newpassword=="")
        {
            $err="<font color='red'>fill all the fileds first</font>";	
        }
        else
        {
            $oldpassword=md5($oldpassword);	

            $sql_ret = mysqli_query($conn,"select * from user where password='$oldpassword'");

            //echo $oldpassword;
            $num = mysqli_num_rows($sql_ret);
            if($num == true)
            {
                    $newp=md5($newpassword);
                    $sql=mysqli_query($conn,"update user set password='$newp' where rollnumber='".$_SESSION['user']."'");
                
                    $err="<font color='blue'>Password updated </font>";
            }
            else
            {
                $err="<font color='red'>Wrong Old Password </font>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
    <title>Password Updated</title>
</head>
<body>
    <div class="wrapper">
    <h3><?php echo @$err;?></h3>
    <br>
    <a href="user_pa.html">Go back</a>
    </div>
</body>
</html>