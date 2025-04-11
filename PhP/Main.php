

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
    if ($_SESSION['Username'] == null) {
        $_SESSION['Error'] = 'You are not logged in!';
        header("Location: ../index.php");
    }
    
    ?>
</head>

<body>


    <div class="row">

    <?php require '../Partials/Sidebar.php'?>
        <div class="Posts  col-7">

            <div class="all-divs">
                <div class="Buttons ">
                    <div class="Button1 ">
                        <button id="Button1" class="btn btn-outline-secondary">For You</button>
                    </div>
                    <div class="Button2">
                        <button id="Button2" class="btn btn-outline-secondary">Following</button>
                    </div>
                </div>


            </div>

        </div>

        <div class="SideBar2  col-3">
            <div class="SearchBar">
                <form action="">

                    <input class="form-control me-2" type="search" name="Search" id="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>

                <div class="acounts">
                    <h2>Voorgesteld voor jou</h2>
                    <div class="user-container">
                        <div class="user">
                            <img src="../Assets/Images/pexels-pixabay-268533.jpg" alt="Account1" class="img-fluid rounded-circle">
                            <h3>Account</h3>
                        </div>
                        <input type="button" value="Follow" class=" btn btn-outline-primary ">
                    </div>
                    <div class="user-container">
                        <div class="user">
                            <img src="../Assets/Images/pexels-pixabay-268533.jpg" alt="Account1" class="img-fluid rounded-circle">
                            <h3>Account</h3>
                        </div>
                        <input type="button" value="Follow" class="btn btn-outline-primary">
                    </div>


                </div>


            </div>


        </div>

    </div>


</body>

</html>