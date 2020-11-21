<?php 
ob_start();
session_start();
include('action/db_connect.php');

if (!isset($_SESSION['user']) && (!isset($_SESSION['admin']))) {
	header("Location: signin.php");
  exit;
}else if(isset($_SESSION['admin'])){
  header("location: admin.php");
  exit;
}

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM petadoption WHERE id = {$id}" ;
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

   $connect->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <title><?php echo $data['name'] ?></title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand mr-auto" href="index.php">
            <img src="https://image.flaticon.com/icons/png/512/103/103717.png" width="30" height="30"
                class="d-inline-block align-top" alt="" loading="lazy">
            Pet Adoption
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_type.php?type=Small">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_type.php?type=Senior">Senior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-11 col-lg-7 d-flex justify-content-center">
                <?php 
                    echo"<div class='card'>
                    <img src='".$data['img']."' class='card-img-top img-fluid card-img m-auto'>
                    <div class='card-body '>
                        <h5 class='card-title'>".$data['name'].',('.$data['age'].')'."</h5>
                        <a href='user_type.php?type=".$data['type']."'><h5 class='card-title'>".$data['type']."</h5></a>
                        <p class='card-text'>Gender: ".$data['gender']."</p>
                        <p class='card-text'>Breed: ".$data['breed']."</p>
                        <p class='card-text'>Short Description:<br><br> ".$data['description']."</p>
                        <p class='card-text'>Hobbies: ".$data['hobbies']."</p>
                        <p class='card-text'>Address: ".$data['address']."</p>
                        <p class='card-text'>Zip: ".$data['zip']."</p>
                        <p class='card-text'>City: ".$data['city']."</p>
                    </div>
                </div>"
                ?>
            </div>
        </div>
    </div>

</body>
</html>
