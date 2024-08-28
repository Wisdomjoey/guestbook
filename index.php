<?php
include './includes/config.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $room = $_POST['room'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $duration = $_POST['duration'];
  $sql = "SELECT id FROM guests WHERE room='$room'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo <<<EOD
      <script>
      alert('Room is already Occupied');
      </script>
    EOD;
  } else {
    $sql = "INSERT INTO guests (name, address, phone, room, duration) VALUES ('$name', '$address', '$phone', '$room', '$duration')";

    if ($conn->query($sql) === TRUE) {
      echo <<<EOD
      <script>
      document.getElementById('guest-form').reset();
      alert('Added new guest successfully');
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>GuestBook</title>
</head>

<body>
  <main>
    <h1>Guest Book</h1>

    <?php
    $btn_text = 'Add Guest';

    include './includes/guest-form.php';
    ?>
  </main>
</body>

</html>