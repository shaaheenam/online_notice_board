<?php

    if(isset($_POST['delete'])){
        $delete_item = $_POST['notice_id'];

        $conn = mysqli_connect('localhost','root','','onb');
        $check = "select * from notice where notice_id = '$delete_item'";

    //check connection
    /*if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }*/
    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $sql = mysqli_query($conn, "delete from notice where notice_id = '$delete_item'");
        header('location:admin_mn.php');
        echo "deletion successful";        
    }
    else{
        echo "notice id not found";
    }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
</head>
<body>
    <a href="admin_mn.php">Click here to go back</a>
</body>
</html>