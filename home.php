<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['adm'])) {
  header("Location: dashboard.php");
  exit;
}
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}

$res = mysqli_query($connect, "SELECT * FROM users WHERE userID =" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM animals";

if(isset($_GET['Senior'])){
    $sql = "SELECT * FROM animals where age >= 8 ";
}else{
    $sql = "SELECT * FROM animals";
}


$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
                <td><img src='pictures/".$row['photo']."' class='card-img-top' alt='...'></td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['age'] . "</td>
                <td>" . $row['location'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['size'] . "</td>
                <td>" . $row['hobbies'] . "</td>
                <td>" . $row['breed'] . "</td>
                <td>" . $row['status'] . "</td>
                <td><a href='moredetails.php?name=" . $row['name'] . "'><button class='btn btn-info btn-md w-100 mb-2' type='button'>Info</button></a></td>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello <?php echo $row['first_name']; ?></title>
  <?php require_once 'components/boot.php' ?>
</head>

<body>
<?php require_once 'components/nav1.php'?>

  <div class="container">
      <p class='mt-5 mb-5 display-2 text-center'>Animals</p>
      <div class="d-flex justify-content-start mt-4 mb-3">
        <a href="home.php"  class="btn btn-outline-success btn-lg ">Show all pets </a>
        <a href="home.php?Senior='Senior'" class="btn btn-outline-primary btn-lg"  role="button">Show only senior pets </a>
      </div>
        <table class='table bg-dark text-light'>
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
                    <th class='h3'>Options</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
  </div>
</body>
</html>