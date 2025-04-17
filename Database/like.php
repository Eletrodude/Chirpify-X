<?php

$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']); 

        
        $stmt = $conn->prepare("UPDATE posts SET likes = likes + 1 WHERE id = :id");
        $stmt->execute(['id' => $post_id]);

        $stmt = $conn->prepare("SELECT likes FROM posts WHERE id = :id");
        $stmt->execute(['id' => $post_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo $row['likes'];
    } else {
        echo "post_id مفقود.";
    }

} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit;
}
?>

