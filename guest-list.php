<?php
include './includes/config.php';

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM guests WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo <<<EOD
        <script>
        alert('Deleted guest successfully');
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
  <title>Guest List</title>
</head>

<body>
  <main>
    <a href="/" class="back__link">Back</a>

    <h1>Guest List</h1>

    <div class="guest__list">
      <?php
      $sql = "SELECT * FROM guests";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $room = $row['room'];
          $name = $row['name'];
          $phone = $row['phone'];
          $address = $row['address'];
          $duration = $row['duration'];

          echo <<<EOD
            <div class="guest">
            <div class="guest__head">
            <h2>#$id</h2>
            
            <div class="action__btns">
            <form method="POST">
            <input type="text" name="id" value="$id" hidden>
            <button name="delete" type="submit" class="delete__btn">
            <svg viewBox="0 0 24 24" fill="none" width="18" height="18" stroke="rgb(var(--red))"
            xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
            {" "}
            <path d="M10 12V17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>{" "}
            <path d="M14 12V17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>{" "}
            <path d="M4 7H20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>{" "}
            <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"></path>{" "}
            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"></path>{" "}
            </g>
            </svg>
            </button>
            </form>

            <a href="guest.php?id=$id" class="edit__btn">
            <svg
            viewBox="0 0 24 24"
            fill="none"
            width="18" height="18"
            xmlns="http://www.w3.org/2000/svg"
            stroke="rgb(var(--black) / 80%)"
            >
            <g id="SVGRepo_bgCarrier" strokeWidth="0"></g>
            <g
            id="SVGRepo_tracerCarrier"
            strokeLinecap="round"
            strokeLinejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
            {" "}
            <path
            d="M12 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V12M9 15V12.5L17.75 3.75C18.4404 3.05964 19.5596 3.05964 20.25 3.75V3.75C20.9404 4.44036 20.9404 5.55964 20.25 6.25L15.5 11L11.5 15H9Z"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
            ></path>{" "}
            </g>
            </svg>
            </a>
            </div>
            </div>

            <div class="guest__info__list">
            <p class="guest__info">
            <b>Name:</b>
            <span>$name</span>
            </p>

            <p class="guest__info">
            <b>Address:</b>
            <span>$address</span>
            </p>

            <p class="guest__info">
            <b>Mobile:</b>
            <span>$phone</span>
            </p>

            <p class="guest__info">
            <b>Room No.:</b>
            <span>Room $room</span>
            </p>

            <p class="guest__info">
            <b>Stay Duration:</b>
            <span>$duration day(s)</span>
            </p>
            </div>
            </div>
          EOD;
        }
      }
      ?>
    </div>
  </main>
</body>

</html>