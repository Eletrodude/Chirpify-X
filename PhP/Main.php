
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/MainPage.css">
    <title>Chirpify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
    session_start();
    $cuon = $_SESSION['Username'];
    if ($_SESSION['Username'] == null) {
        $_SESSION['Error'] = 'You are not logged in!';
        header("Location: ../index.php");
    }
    
    ?>
</head>

<body>

    
    <div class="row" >              


                        <?php require '../Partials/Sidebar.php'?>
                                                        
                        <div class="Posts  col-7">

                             <div class="all-divs">
                                <div class="Buttons ">
                                    <div class="Button1 "  >
                                        <button id="Button1" class="btn btn-outline-secondary" >For You</button>
                                    </div>
                                    <div class="Button2">
                                        <button id="Button2" class="btn btn-outline-secondary">Following</button>
                                    </div>
                                </div>
                                <div class="bericht">
                                    <form action="../Database/post.php" method="POST"  enctype="multipart/form-data">
                                            <input type="file" name="image" accept="image/jpeg,image/png,image/gif" required><br><br>
                                            <button type="submit" class="btn btn-outline-primary">bericht</button>
                                    </form>


                                </div>
                                <div class="Post">
                                        
                                    <?php
                                        $username = 'root';
                                        $password = '';
                                        try {
                                            $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $posts = $conn->prepare("SELECT * FROM post_database");
                                            $posts->execute();
                                            // الاتصال جاهز للاستخدام
                                        } catch (PDOException $e) {
                                            echo "Verbinding mislukt: " . $e->getMessage();
                                            exit;
                                        }
                                    ?>
                                    <?php foreach ($posts as $post): ?>
                                        <div class="Post1">
                                            <div class="post-Header">
                                                <img src="../Assets/Images/pexels-pixabay-268533.jpg" alt="Account1" class="img-fluid rounded-circle">
                                                <a href="#"> <?php echo htmlspecialchars($_SESSION['Username']); ?></a>
                                            </div>

                                            <div class="post-Body">
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($post['Image']); ?>" alt="Post image" class="img-fluid rounded">
                                            </div>

                                            <div class="icons">
                                            <button onclick="event.preventDefault(); likePost(this)">
                                                <img src="../Assets/Images/icons8-like-50.png" alt="like-icon">
                                            </button>
                                                <a href="../Database/comment.php"><img src="../Assets/Images/icons8-topic-50.png" alt="comment-icon"></a>
                                            </div>
                                            <span id="likeCount">0 LIKE</span>
                                            <div class="comments">
                                                
                                            <?php
                                                $username = 'root';
                                                $password = '';
                                                try {
                                                    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
                                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                    $stmt = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
                                                    foreach ($stmt as $row) {
                                                        echo "<p><strong>" .htmlspecialchars($_SESSION['Username']) . "</strong>: " . htmlspecialchars($row['comment']) . "</p>";
                                                    }

                                                } catch (PDOException $e) {
                                                    echo "SEND FOET" . $e->getMessage();
                                                }
                                                ?>

                                            <form action="../Database/comment.php" method="POST">
                                                <textarea name="comment" placeholder="اكتب تعليقك..." required></textarea>
                                                <button type="submit">إرسال</button>
                                            </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                        
                                </div>
                                
                             </div>
                        </div>

                        <div class="SideBar2  col-3">


                            <div class="SearchBar">
                                <div class="user">
                                        <a href="#">
                                        <?php echo $cuon ?> 
    

                                        
                                        </a>
                                </div>

                                <form action="">
                                   
                                    <input class="form-control me-2" type="search" name="Search" id="Search">
                                    <button class="btn btn-outline-primary" type="submit" >Search</button>
                                </form>
                                
                                <div class="acounts">
                                    <h2>Voorgesteld voor jou</h2>
                                    <div class="user-container">
                                        <div class="user">
                                            <img src="../Assets/Images/pexels-pixabay-268533.jpg" alt="Account1" class="img-fluid rounded-circle">
                                            <a href="#">Account</a>
                                        </div>
                                        <input type="button" value="Follow" class=" btn btn-outline-primary ">
                                    </div>
                                    <div class="user-container">
                                        <div class="user">
                                            <img src="../Assets/Images/pexels-pixabay-268533.jpg" alt="Account1" class="img-fluid rounded-circle">
                                            <a href="#">Account</a>
                                        </div>
                                        <input type="button" value="Follow" class="btn btn-outline-primary">
                                    </div>


                </div>


            </div>


        </div>

    </div>

 
</body>
</html>
