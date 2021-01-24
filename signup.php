<?php
$conn = mysqli_connect('localhost','root','','onb');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

if(isset($_POST['signup']))
{
    $rollnumber = $_POST['rollnumber'];

    $check = "select * from user where rollnumber = '$rollnumber";

    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);

    if($num == true)
    {
        $err = "User already exists. Please login";
    }
    else
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $rollnumber = mysqli_real_escape_string($conn, $_POST['rollnumber']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);


        $encry = md5($password);

        $sql = "INSERT INTO user(name,password,email,rollnumber,dob,address,mobile,gender) VALUES('$name','$encry','$email','$rollnumber','$dob','$address','$mobile','$gender')";
        
        //save to db and check
        if(mysqli_query($conn, $sql)){
            //success
            //echo 'success';
            //header('location:signup.html')
            $err="<font color='blue'>Registration successfull !!</font>";

        } else{
            //error
            echo 'query error: ' . mysqli_error($conn);
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <p> <?php echo @$err;?> </p>
    <br>
    <a href="login.html">Go to login</a>
</body>
</html>