<?php
$conn = new mysqli("localhost", "root", "", "portofolio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getImageByName($conn, $imageName) {
    $sql = "SELECT image FROM gallery WHERE image_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $imageName);
    $stmt->execute();
    $stmt->bind_result($imageData);
    $stmt->fetch();
    $stmt->close();

    return 'data:image/jpeg;base64,' . base64_encode($imageData);
}

$image1 = getImageByName($conn, 'mila');
$image2 = getImageByName($conn, 'milla');
$image3 = getImageByName($conn, 'b1');
$image4 = getImageByName($conn, 'b2');
$image5 = getImageByName($conn, 'b3');
$image6 = getImageByName($conn, 'b4');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GALLERY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <d class="hero">
        <nav>
          <img src="logo/logo.png" alt="" class="logo">
          <ul>
            <li><a href="index.html">BERANDA</a></li>
            <li><a href="Gallery.php">GALERI</a></li>
            <li><a href="Blog.php">BLOG</a></li>
            <li><a href="contack.html">HUBUNGI SAYA</a></li>
          </ul>
        </nav>
    <div
    class="conten">
        <div class="hed">
            <h1>Milla'Gallery</h1>
        </div>
        <div class="Gallery">
            <img src="<?php echo $image1; ?>">
            <img src="<?php echo $image2; ?>">
            <img src="<?php echo $image3; ?>">
            <img src="<?php echo $image4; ?>">
            <img src="<?php echo $image5; ?>">
            <img src="<?php echo $image6; ?>">
        </div>
</body>
</html>