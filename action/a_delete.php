<?php 

require_once 'db_connect.php';

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM `petadoption` WHERE id = '{$id}'";
    if($connect->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../index.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error deleting record : " . $connect->error;
   }

   $connect->close();
}

?>