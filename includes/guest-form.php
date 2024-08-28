<fieldset>
  <legend>Guest Form</legend>

  <form method="post" id="guest-form">
    <?php
    $fields = [
      [
        "id" => "name",
        "label" => "Fullname",
        "type" => "text",
        "placeholder" => "e.g. John Doe",
        "value" => $name ?? "",
      ],
      [
        "id" => "address",
        "label" => "Address",
        "type" => "text",
        "placeholder" => "e.g. Block A, Allen Avenue",
        "value" => $address ?? "",
      ],
      [
        "id" => "phone",
        "label" => "Mobile Number",
        "type" => "tel",
        "placeholder" => "e.g. +234869403345",
        "value" => $phone ?? "",
      ],
      [
        "id" => "room",
        "label" => "Room No.",
        "type" => "text",
        "placeholder" => "e.g. 123",
        "value" => $room ?? "",
      ],
      [
        "id" => "duration",
        "label" => "Duration (in days)",
        "type" => "number",
        "placeholder" => "e.g. 6",
        "value" => $duration ?? "",
      ],
    ];

    foreach ($fields as $field) {
      $id = $field['id'];
      $type = $field['type'];
      $label = $field['label'];
      $value = $field['value'];
      $placeholder = $field['placeholder'];

      echo <<<EOD
          <div class="input__con">
          <label for="$id">$label:</label>
          <input type="$type" name="$id" id="$id" value="$value" placeholder="$placeholder">
          </div>
          EOD;
    }
    ?>

    <div class="button__con">
      <button name="submit" type="submit">
        <?php echo $btn_text; ?>
      </button>

      <a href="/guest-list.php">View All</a>
    </div>
  </form>
</fieldset>