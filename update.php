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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Update</title>
    <style>

    </style>
</head>

<body>
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

<div class="container mt-5">

<a href='index.php' class='btn btn-dark '>Back</a>

    <form action="action/a_update.php" method="post" class="form-group mt-5">
        <input class="form-control"type="hidden" value="<?php echo $data['id'] ?>" name="id">
        <input class="form-control"type="text" value="<?php echo $data['name'] ?>" name="name">
        <input class="form-control"type="text" value="<?php echo $data['img'] ?>" name="img">
        <input class="form-control"type="text" value="<?php echo $data['breed'] ?>" name="breed">
        <input class="form-control"type="text" value="<?php echo $data['description'] ?>" name="description">
        <input class="form-control"type="text" value="<?php echo $data['hobbies'] ?>" name="hobbies">
        <input class="form-control"type="text" value="<?php echo $data['age'] ?>" name="age">
        <input class="form-control"type="text" value="<?php echo $data['city'] ?>" name="city">
        <input class="form-control"type="text" value="<?php echo $data['zip'] ?>" name="zip">
        <input class="form-control"type="text" value="<?php echo $data['address'] ?>" name="address">
        <select class="form-control" name="type" placeholder="type">
            <option value="Small" selected>Small</option>
            <option value="Large">Large</option>
            <option value="Senior">Senior</option>
        </select>
        <select class="form-control" name="gender" placeholder="gender">
            <option value="Male" selected>Male</option>
            <option value="Female">Female</option>
        </select><br>
        <input type="submit" value="Update"  class='btn btn-dark mt-2'>
    </form>
        
</div>

</body>

</html>