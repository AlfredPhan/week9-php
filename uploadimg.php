<?php
if (isset($_POST['joketext']) && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            try {
                include 'DatabaseConnection.php';

                $sql = 'INSERT INTO joke (joketext, jokedate, image) VALUES (:joketext, CURDATE(), :image)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':joketext', $_POST['joketext']);
                $stmt->bindValue(':image', basename($_FILES["image"]["name"]));
                $stmt->execute();

                header('Location: jokes.php');
                exit();
            } catch (PDOException $e) {
                $title = 'An error has occurred';
                $output = 'Database error: ' . $e->getMessage();
                include 'error.html.php';
                exit();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

