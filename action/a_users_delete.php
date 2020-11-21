<?php 

require_once 'db_connect.php';

if ($_POST) {
   $user_id = $_POST['user_id'];

   $sql = "DELETE FROM `users` WHERE user_id='$user_id'";
    if($connect->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../users.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error deleting record : " . $connect->error;
   }

   $connect->close();
}

?>
