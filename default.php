<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Upload and Preview</title>
</head>
<body>
  <input type="file" id="imageInput" accept="image/*">
  <button onclick="uploadImage()">Upload</button>
  <div id="imagePreview"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function uploadImage() {
      let formData = new FormData();
      let fileInput = document.getElementById('imageInput');
      formData.append('images', fileInput.files[0]);

      $.ajax({
        url: '<?= $_SERVER['PHP_SELF'] ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#imagePreview').html('<img src="' + response + '" width="200">');
        }
      });
    }
  </script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_FILES['images']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'resources/gallery/';
    $uploadFile = $uploadDir . basename($_FILES['images']['name']);

    if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadFile)) {
      // Save to database
      $dbHost = 'localhost';
      $dbUsername = 'root';
      $dbPassword = '';
      $dbName = 'drrmo';

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $imagePath = mysqli_real_escape_string($conn, $uploadFile);
      $sql = "INSERT INTO usar (images) VALUES ('$imagePath')";

      if ($conn->query($sql) === TRUE) {
        echo $uploadFile;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    } else {
      echo "Failed to move uploaded file.";
    }
  } else {
    echo "File upload error.";
  }
}
?>
</body>
</html>
