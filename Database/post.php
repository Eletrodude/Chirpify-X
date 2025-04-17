<?php
session_start();
$username = 'root';
$password = '';
file_put_contents("debug.txt", "METHOD: " . $_SERVER['REQUEST_METHOD']);
try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && isset($_SESSION['User_ID'])) {
        $id = $_SESSION['User_ID'];
        $image = $_FILES['image'];

        // Controleer op fouten bij het uploaden van het bestand
        if ($image['error'] !== UPLOAD_ERR_OK) {
            echo 'Er is een fout opgetreden bij het uploaden van de afbeelding';
            exit;
        }

        // Controleer of het bestand een afbeelding is
        $imageType = mime_content_type($image['tmp_name']);
        if (strpos($imageType, 'image') === false) {
            echo 'Upload alleen afbeeldingen';
            exit;
        }

        // Toegestane afbeeldingsformaten
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imageType, $allowedTypes)) {
            exit;
        }

        // Lees de inhoud van de afbeelding
        $imageData = file_get_contents($image['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO post_database (User_ID, Image) VALUES (?, ?)");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $imageData, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            echo 'Afbeelding succesvol geüpload';
        } else {
            echo 'Er is een fout opgetreden bij het uploaden van de afbeelding';
        }
    } else {
        echo 'Fout: Onvolledige gegevens';
    }
} else {
    echo 'Fout: Afbeelding niet geüpload';
}
  header ('Location:../PhP/Main.php ');
  exit;
?>
