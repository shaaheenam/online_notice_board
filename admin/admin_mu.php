<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/user.css" />
        <title>Manage Users</title>
    </head>
    <body>
        <header id="main-header">
        <div class="header1">
            <h3>Online Notice Board</h3>
        </div>
        </header>

        <nav id="navbar">
            <div class="topnav">
                <p>Admin</p>
                <div class="topnav-right">
                    <a href="alogout.php">Log Out</a>
                </div>
            </div>
        </nav>
<div class="wrapper">
    <div class="links">
        <a href="admin_pa.html">Update Password</a>
        <br>
        <a href="admin_mu.php">Manage Users</a>
        <br>
        <a href="admin_mn.php">Manage Notices</a>
    </div>

    <div>

        <?php
        
            session_start();
            $conn = mysqli_connect('localhost','root','','onb');
        
            $sql = mysqli_query($conn,"select * from user ");
            $num = mysqli_num_rows($sql);
            if(!$num)
            {
                echo "<h2 style='color:red'>No users yet</h2>";
            }
            else
            {
            ?>
            
            <h2 style="color:#00FFCC">All Users</h2>

            <table class="table">
                <Tr class="table-head">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Roll Number</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                </Tr>
                    <?php 


            $i=1;
            while($row=mysqli_fetch_assoc($sql))
            {

            echo "<Tr>";
            echo "<td>".$row['user_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['rollnumber']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "</Tr>";
            $i++;
            }
                    ?>
                    
            </table>
        <?php }?>

        <br><br>
        <div>
            <h3>Delete Notice</h3>
                    <form action="delete_user.php" method="POST">
                        <h4>Enter User ID to delete</h4>
                        <div>
                            <label>User ID</label>
                            <input type="number" name="user_id" placeholder="Enter ID">
                        </div>
                        <br>
                        <div>
                            <input type="submit" name="delete">
                        </div>
                    </form>
        </div>
        
    </div>
    </div>
    </body>

</html>