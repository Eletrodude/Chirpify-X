<?php
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['username'];
        $comment = $_POST['comment'];

        $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (:username, :comment)");
        $stmt->execute([
            ':username' => $name,
            ':comment' => $comment
        ]);

        echo "SEND SUCCESSFULLY";
    }

} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit;
}
header ('Location:../PhP/Main.php ');
exit;
?>
