<?php 

include("db_connect.php");

if($_POST){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $img=$_POST['img'];
    $age=$_POST['age'];
    $breed=$_POST['breed'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $hobbies=$_POST['hobbies'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $empty="false";

    if(isset($_POST['submit'])){
        if(empty($name) || empty($img)|| empty($age)||empty($hobbies) || empty($breed) || empty($description) || empty($address) || empty($city) || empty($zip)){
            $empty="true";
        }
}

if($empty==="false"){
    $sql="UPDATE `petadoption` SET `name`='$name',`gender`='$gender',`img`='$img',`description`='$description',`hobbies`='$hobbies',`age`='$age',`breed`='$breed',`type`='$type',`city`='$city',`zip`='$zip',`address`='$address'WHERE id='{$id}'";
    if($connect->query($sql)=== TRUE){
        echo"<p>Successfully updated</p>";
        echo"<button><a href='../index.php'>Home</a></button>";
    }else{
        echo"Error" .$sql. ' '. $connect->connect_error;
    }
    
}else{
    echo"Please fill all fields";
    echo"<button ><a href='../create.php'>Back</a></button>";
    echo"<button><a href='../index.php'>Home</a></button>";
}

   

}
$connect->close();

?>