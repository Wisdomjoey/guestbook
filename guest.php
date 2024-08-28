<?php
include './includes/config.php';

$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $name_n = $_POST['name'];
  $room_n = $_POST['room'];
  $phone_n = $_POST['phone'];
  $address_n = $_POST['address'];
  $duration_n = $_POST['duration'];
  $sql = "UPDATE guests SET name='$name_n', address='$address_n', phone='$phone_n', room='$room_n', duration='$duration_n' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo <<<EOD
        <script>
        alert('Updated guest successfully');
        </script>
      EOD;
  } else {
    echo <<<EOD
        <script>
        alert('Something went wrong');
        </script>
      EOD;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Guest</title>
</head>

<body>
  <main>
    <a href="/" class="back__link">Back</a>

    <h1>Update Guest</h1>

    <?php
    $btn_text = 'Update Guest';

    if (isset($id)) {
      $sql = "SELECT * FROM guests WHERE id=$id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $room = $row['room'];
        $phone = $row['phone'];
        $address = $row['address'];
        $duration = $row['duration'];

        include './includes/guest-form.php';
      } else {
        echo '<p>Guest not found</p>';
      }
    } else {
      echo '<p>Guest not found</p>';
    }
    ?>
  </main>
</body>

</html>