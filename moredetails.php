<?php
require_once 'components/db_connect.php';

if ($_GET['name']) {
    $name = $_GET['name'];
    $sql = "SELECT * FROM animals WHERE name = '$name'";
    $result = mysqli_query($connect, $sql);
    $tbody = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" . $row['photo'] . "'</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['location'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['hobbies'] . "</td>
            <td>" . $row['breed'] . "</td>
            <td>" . $row['status'] . "</td>
            </tr>";
        }
    } else {
        $tbody = "<tr><td colspan='5'><center>NO AVAILABLE DATA</center></td></tr>";
    }
}
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Page</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .pets {
            margin: auto;
        }
    </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="home.php">Pet Adoption</a>
    <div>
      <a href="index.php"><button class='btn btn-md btn-outline-info' type="button">GO BACK</button></a>
    </div>
   </nav>
    <div class="pets w-50 mt-5 bg-dark">
    <table class='table text-light'>
            <thead class='table-secondary'>
                <tr>
                    <th class='h3'>Picture</th>
                    <th class='h3'>Name</th>
                    <th class='h3'>Age</th>
                    <th class='h3'>Location</th>
                    <th class='h3'>Description</th>
                    <th class='h3'>Size</th>
                    <th class='h3'>Hobbies</th>
                    <th class='h3'>Breed</th>
                    <th class='h3'>Status</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
        <div class='mb-5 d-flex justify-content-center'>
            <a href="index.php"><button class='btn btn-md btn-outline-info' type="button">GO BACK</button></a>
        </div>
    </div>
</body>

</html>