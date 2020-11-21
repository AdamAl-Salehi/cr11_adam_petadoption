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
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Add Pet</title>

    <style>
    /* body {
        background-color: #A5D8FF;
    }

    .card {
        background-color: #AFD0D6;
    }

    .my-3 {
        width: 10rem;
    } */
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
        <h1>Add Pet</h1>
        <div class="container mt-5">
            <div class="form-group justify-content-center">
                <form action="action/a_create.php" method="post">
                    <input class="form-control mt-1" placeholder="id"type="hidden" name="id">
                    <input class="form-control mt-1" placeholder="Name"type="text" name="name">
                    <input class="form-control mt-1" placeholder="image URL"type="text" name="img">
                    <input class="form-control mt-1" placeholder="Breed"type="text" name="breed">
                    <input class="form-control mt-1" placeholder="Description"type="text" name="description">
                    <input class="form-control mt-1" placeholder="Hobbies"type="text" name="hobbies">
                    <input class="form-control mt-1" placeholder="age"type="text" name="age">
                    <input class="form-control mt-1" placeholder="City"type="text" name="city">
                    <input class="form-control mt-1" placeholder="Zip Code"type="text" name="zip">
                    <input class="form-control mt-1" placeholder="Address"type="text" name="address">
                    <select class="form-control mt-1"placeholder="type" name="type" placeholder="type">
                        <option value="Small" selected>Small</option>
                        <option value="Large">Large</option>
                        <option value="Senior">Senior</option>
                    </select>
                    <select class="form-control mt-1" name="gender" placeholder="gender">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select><br>
                    <input type="submit" name="submit" value="Add Pet" class='btn btn-dark my-3'>
                </form>
            </div>
        </div>
        <button type="submit" class='btn btn-dark m-auto'><a href="index.php">Back</a></button>

    </div>

</body>

</html>