<?php
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location: ../home.php");
    exit;
}
require_once '../components/db_connect.php';
$sql = "SELECT * FROM animals";
$result = mysqli_query($connect ,$sql);
$tbody='';
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img  src='../pictures/" .$row['photo']."' class='card-img-top'</td>
            <td>" .$row['name']."</td> 
            <td>" .$row['location']."</td>
            <td>" .$row['description']."</td>
            <td>" .$row['size']."</td>
            <td>" .$row['age']."</td>
            <td>" .$row['hobbies']."</td>
            <td>" .$row['breed']."</td>
            <td>" .$row['status']."</td>
            <td>
            <a href='update.php?animal_id=" .$row['animal_id']."'><button class='btn btn-warning btn-md mt-5' title='Edit Pet' type='button'>Edit<i class='far fa-edit'></i></button></a>
            <a href='delete.php?animal_id=" .$row['animal_id']."'><button class='btn btn-danger btn-md mt-5' title='Delete Pet' type='button'>Delete<i class='fas fa-trash'></i></button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='6'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pet Adoption | Admin</title>
        <link rel="stylesheet" href="">
        <?php require_once '../components/boot.php'?>
      </head>
    <body>
    <?php require_once '../components/nav3.php'?>

        <div class="container text-center">  
        <h4 class="mt-5 mb-5 display-2 text-center" > All of the Pets</h4> 
            <a href= "create.php"><button class='btn btn-info mb-5'type="button" >Add new Pet</button></a>
            <div class="container">
            
            <table class='table bg-dark text-light'>
                <thead class='table-primary'>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Age</th>
                        <th>Hobbies</th>
                        <th>Breed</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?>
                </tbody>
            </table>
            </div>
        </div>
    </body>
</html>