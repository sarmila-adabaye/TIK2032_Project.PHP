<?php
$conn = new mysqli("localhost", "root", "", "portofolio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    die("Error loading character set utf8: " . $conn->error);
}

function getBlogTextByName($conn, $blogName) {
    $sql = "SELECT blog_text FROM blog WHERE blog_name=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $blogName);

    $executeResult = $stmt->execute();
    if ($executeResult === false) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->bind_result($blogText);
    $stmt->fetch();
    $stmt->close();

    return $blogText;
}

$blog1 = getBlogTextByName($conn, 'chatgpt');
$blog2 = getBlogTextByName($conn, 'aiberbahaya');
$blog3 = getBlogTextByName($conn, 'apaituai');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css" />
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
    <h1>Apa itu Chat GPT dan My AI Snapchat?</h1>
    <div class="Blog">
        <img src="img/Alif.jpg" width="100%" height="50%" alt/>
    </div>
    <p>
        <?php echo htmlspecialchars($blog1, ENT_QUOTES, 'UTF-8'); ?>
    </p>

     <h1>Mengapa kritikus khawatir AI bisa berbahaya?</h1>
     <div class="Blog">
        <img src="img/herni.jpg" width="100%" height="50%" alt/>
    </div>
    <p>
        <?php echo htmlspecialchars($blog2, ENT_QUOTES, 'UTF-8'); ?>
    </p>

     <h1>Apa itu AI dan bagaimana cara kerjanya?</h1>  
     <div class="Blog">
        <img src="img/saya.jpg" width="100%" height="50%" alt/>
    </div>
    <p>
        <?php echo htmlspecialchars($blog3, ENT_QUOTES, 'UTF-8'); ?>
    </p>
     
    </body>
</html>