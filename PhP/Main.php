
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/MainPage.css">
    <title>Chirpify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <?php session_start() ; 
    
    if (isset($_SESSION['Username'])){
        $cuon = 'Hello '.$_SESSION['Username'];

    }
    else{
        $_SESSION['Error'] = 'Username incorrect?';
        header('location: ../index.php');
    }
     ?>
</head>

<body>

    
    <div class="row" >              
                    <div class=" SideBar  col-2" >
                            <div  class="Logo">
                                       
                                    <h1 class="nav-item"> Chirpify</h1>
                            </div>
                            <div class="Links">
                                <ul class="navbar-nav ">
                                    <li class="nav-item">
                                    <a class="nav-link"  href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Explore</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Notifications</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Messages</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Legal</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">loguit</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                                    
                            
                        
                            
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
                                                <a href="#"><img src="../Assets/Images/icons8-like-50.png" alt="like-icon"></a>
                                                <a href="#"><img src="../Assets/Images/icons8-topic-50.png" alt="comment-icon"></a>
                                            </div>

                                            <div class="comments">
                                                <div class="comment">
                                                    <a href="#">user-name</a>
                                                    <p>Dit is een comment</p>
                                                </div>
                                                <form action="">
                                                    <input type="text" name="comment" id="comment" placeholder="Add a comment...">
                                                    <button type="submit" class="btn btn-outline-primary">plaatsen</button>
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
                                        <?php echo $cuon; ?> 
    

                                        
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
