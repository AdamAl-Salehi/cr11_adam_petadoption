<?php 

include("db_connect.php");


    if($_POST){
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $empty="false";

        if(isset($_POST['submit'])){
            if(empty($user_name) || empty($email)){
                $empty="true";
            }
    }

if($empty==="false"){
    $sql="UPDATE `users` SET `user_name`='$user_name',`email`='$email',`status`='$status'WHERE user_id='$user_id'";
    if($connect->query($sql)=== TRUE){
        echo"<p>Successfully updated</p>";
        echo"<button><a href='../users.php'>Home</a></button>";
    }else{
        echo"Error" .$sql. ' '. $connect->connect_error;
    }
    
}else{
    echo"Please fill all fields";
    echo"<button ><a href='users.php'>Back</a></button>";
    echo"<button><a href='../users.php'>Home</a></button>";
}

   

}
$connect->close();

?>