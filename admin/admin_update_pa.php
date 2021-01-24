<?php

    session_start();
    $conn = mysqli_connect('localhost','root','','onb');


    extract($_POST);
    if(isset($update))
    {

        if($oldpassword=="" || $newpassword=="")
        {
            $err="<font color='red'>fill all the fields</font>";	
        }
        else
        {
            //$oldpassword=md5($oldpassword);	

            $sql_ret = mysqli_query($conn,"select * from admin where password='$oldpassword'");
            var_dump(mysqli_error($conn));
            $num = mysqli_num_rows($sql_ret);
            if($num == true)
            {
                    //$newp=md5($newpassword);
                    $sql=mysqli_query($conn,"update admin set password='$newpassword' where username='".$_SESSION['admin']."'");
                
                    $err="<font color='blue'>Password updated </font>";
                    $err="".$_SESSION['admin']."";
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
    <title>Password Update message</title>
</head>
<body>
    <h3><?php echo @$err;?></h3>
    <br>
    <a href="admin_pa.html">Go back</a>
</body>
</html>