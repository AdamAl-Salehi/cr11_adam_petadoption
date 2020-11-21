<?php 

ob_start();
session_start();
include('action/db_connect.php');

if (!isset($_SESSION['user']) && (!isset($_SESSION['admin']))) {
	header("Location: signin.php");
  exit;
}else if(isset($_SESSION['user'])){
  header("location: index.php");
  exit;
}


if ($_GET['type']) {
    $type = $_GET['type'];
    if($type=='Senior'){   
        $sql = "SELECT * FROM `petadoption` WHERE type = 'Senior'";
    }
    if($type=='Small'||$type=='Large' ){   
        $sql = "SELECT * FROM `petadoption` WHERE NOT type =  'Senior'";
    }
    $result = $connect->query($sql);

   $data = $result->fetch_all(MYSQLI_ASSOC);

   $connect->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?php echo $type; ?> Pets</title>
    <style>
    .card-img {
        float: left;
        width: 350px;
        height: 350px;
        object-fit: scale-down;
    }
    </style>
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
                    <a class="nav-link" href="type.php?type=Small">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="type.php?type=Senior">Senior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row justify-content-center">

            <?php 
                
                if($result->num_rows > 0){
                    foreach($data as $value ){
                        echo"
                        <div class='col-s-11 col-m-11 col-lg-4 '>
                            <div class='card mb-5'>
                                <img src='".$value['img']."' class='card-img-top img-fluid card-img m-auto'>
                                <div class='card-body '>
                                    <h5 class='card-title'>".$value['name'].',('.$value['age'].')'."</h5>
                                    <h5 class='card-title'>".$value['type']."</h5>
                                    <p class='card-text'>Gender: ".$value['gender']."</p>
                                    <p class='card-text'>Breed: ".$value['breed']."</p>
                                    <a href='petinfo.php?id=".$value['id']."'>Show info</a>
                                    <div class='btn-class d-flex mt-3'>
                                        <a href='update.php?id=".$value['id']."' class='btn btn-dark m-auto'>Update</a>
                                        <a href='delete.php?id=".$value['id']."' class='btn btn-dark m-auto'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </div>

</body>

</html>