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
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
                <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'</td>
                <td>" . $row['Picture'] . "</td>
                <td>" . $row['Name'] . "</td>
                <td>" . $row['Location'] . "</td>
                <td>" . $row['Description'] . "</td>
                <td>" . $row['Size'] . "</td>
                <td>" . $row['Hobbies'] . "</td>
                <td>" . $row['Breed'] . "</td>
                <td>" . $row['Color_Pattern'] . "</td>";
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
  <title>Welcome - <?php echo $row['first_name']; ?></title>
  <?php require_once 'components/boot.php' ?>
  <style>
      .userImage {
          width: 200px;
          height: 200px;
      }

      .hero {
          background: rgb(2, 0, 36);
          background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
      }
  </style>
</head>

<body>
  <div class="container">
      <div class="hero">
          <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
          <p class="text-white">Hi <?php echo $row['first_name']; ?></p>
      </div>
      <div>
      <p class='mt-5 mb-5 display-2 text-center'>Animals</p>
        <table class='table bg-dark text-light'>
            <thead class='table-secondary'>
                <tr>
                    <th class='h3'>Picture</th>
                    <th class='h3'>Name</th>
                    <th class='h3'>Location</th>
                    <th class='h3'>Description</th>
                    <th class='h3'>Size</th>
                    <th class='h3'>Hobbies</th>
                    <th class='h3'>Breed</th>
                    <th class='h3'>Color</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
      </div>
      <a href="logout.php?logout">Sign Out</a>
      <a href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
  </div>
</body>
</html>