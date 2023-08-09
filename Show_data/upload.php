<?php
session_start();
$target_dir = "uploads/";
$uploadOk = 1;
$imagePath = '';

if (isset($_FILES['fileInput'])) {
    $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST['submit'])) {
        if (isset($_FILES['fileInput']['tmp_name'])) {
            $check = getimagesize($_FILES['fileInput']['tmp_name']);
            if ($check !== false) {
                echo "File is an image - " . $check['mime'] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['fileInput']['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $target_file)) {
            $imagePath = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_SESSION['product-1']) === false && isset($_SESSION['product-2']) === false) {
    $_SESSION['product-1'] = array();
    $_SESSION['product-2'] = array();

    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['status'])) {
        $array_product = array(
            $_POST['name'],
            $_POST['price'],
            $_POST['star'],
            $_POST['status'],
            $imagePath,
        );

        if ($_POST['status'] == "1") {
            array_push($_SESSION['product-1'], $array_product);
        } else if ($_POST['status'] == "2") {
            array_push($_SESSION['product-2'], $array_product);
        }
    }
} else if (isset($_SESSION['product-1']) === true || isset($_SESSION['product-2']) === true) {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['status'])) {
        $array_product = array(
            $_POST['name'],
            $_POST['price'],
            $_POST['star'],
            $_POST['status'],
            $imagePath,
        );

        if ($_POST['status'] == "1") {
            array_push($_SESSION['product-1'], $array_product);
        } else if ($_POST['status'] == "2") {
            array_push($_SESSION['product-2'], $array_product);
        }
    }
}


header("Location: http://localhost:3000/index.php");
