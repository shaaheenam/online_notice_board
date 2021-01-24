<?php

    if(isset($_POST['delete'])){
        $delete_item = $_POST['user_id'];

        $conn = mysqli_connect('localhost','root','','onb');
        $check = "select * from user where user_id = '$delete_item'";

    //check connection
    /*if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }*/
    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $sql = mysqli_query($conn, "delete from user where user_id = '$delete_item'");
        //header('location:index.html');
        echo "deletion successful";        
    }
    else{
        echo "person id not found";
    }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
</head>
<body>
    <a href="admin_mu.php">Click here to go back</a>
</body>
</html>