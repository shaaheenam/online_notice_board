
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/user.css" />
        <title>Manage Notifications</title>
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
            <h3> All Notices</h3>
            
            <div>
                <?php

                //session_start();
                $conn = mysqli_connect('localhost','root','','onb');

                //check connection
                if(!$conn){
                    echo 'Connection error: ' . mysqli_connect_error();
                }

                $sql =mysqli_query($conn, "SELECT * from notice ORDER BY date");

                $num = mysqli_num_rows($sql);
                if(!$num)
                {
                    echo "<h4 style='color:blue'>No Notices Found</h2>";
                }
                else
                {
                ?>

                    <table class="table">
                        
                        <Tr class="table-head">
                            <th>Notice ID</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>User</th>
                            <th>Date</th>
                        </Tr>
                <?php 


                        $i=1;
                        while($row=mysqli_fetch_assoc($sql))
                        {

                        echo "<Tr>";
                        echo "<td>".$row['notice_id']."</td>";
                        echo "<td>".$row['subject']."</td>";
                        echo "<td>".$row['details']."</td>";
                        echo "<td>".$row['user_rollno']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "</Tr>";
                        $i++;
                        }
                ?>
                        
                     </table>
                <?php }?>

                <br><br>
                <div>
                    <h3>Add Notice</h3>
                    <form action="add_notice.php" method="POST">
                        <div>
                            <label>Enter subject</label>
                            <input type="text" name="subject">
                        </div>
                        <br>
                        <div>
                            <label>Enter Details</label>
                            <input type="text" name="details">
                        </div>
                        <br>
                        <div>
                            <label>Enter Roll Number</label>
                            <input type="text" name="rollnumber">
                        </div>
                        <br>
                        <div>
                            <input type="submit" name="add_new" value="Add New Notice">
                        </div>
                        <br>
                        <div>
                            <input type="reset" name="reset">
                        </div>
                    </form>
                </div>
                        
                <br><br>

                <div>
                    <h3>Delete Notice</h3>
                    <form action="delete_notice.php" method="POST">
                        <h4>Enter Notice ID to delete</h4>
                        <div>
                            <label>Notice ID</label>
                            <input type="number" name="notice_id" placeholder="Enter ID">
                        </div>
                        <br>
                        <div>
                            <input type="submit" name="delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    </body>
</html>