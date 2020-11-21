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

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM users WHERE user_id = {$id}" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <title >Delete User</title>
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



<h3>Do you really want to delete this User?<br>You won't be able to get it back if you choose Yes!</h3>
<form action ="action/a_users_delete.php" method="post">

   <input type="hidden" name= "user_id" value="<?php echo $data['user_id'] ?>" />
   <button class='btn btn-dark'type="submit">Yes, delete it!</button >
   <a href='users.php' class='btn btn-dark '>No, Go Back</a>
</form>

</body>
</html>

<?php
}
?>

