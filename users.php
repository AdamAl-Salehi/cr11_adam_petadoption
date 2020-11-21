<?php

ob_start();
session_start();
include('action/db_connect.php');

if (!isset($_SESSION['user']) && (!isset($_SESSION['admin'])) && (!isset($_SESSION['super_admin']))) {
	header("Location: signin.php");
  exit;
}else if(isset($_SESSION['user'])){
  header("location: index.php");
  exit;
}else if(isset($_SESSION['admin'])){
  header("location: admin.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Pet Adoption</title>
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
        <div class="row justify-content-center mb-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">status</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
            $sql="SELECT * from users";
            $result=$connect->query($sql);
            $i=1;
            if($result->num_rows > 0){
                $rows=$result->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $value ){
                    echo" <tr>
                    <th scope='row'>".$i."</th>
                    <td>".$value['user_name']."</td>
                    <td>".$value['email']."</td>
                    <td>".$value['status']."</td>
                    <td>
                        <a href='users_update.php?id=".$value['user_id']."' class='btn btn-dark m-auto'>Update</a>
                        <a href='users_delete.php?id=".$value['user_id']."' class='btn btn-dark m-auto'>Delete</a>
                    </td>
                  </tr>";
                  $i++;
                }
            }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
