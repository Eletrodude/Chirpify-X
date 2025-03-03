<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirpify</title>
    <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>


<div class="Parent">
    <div class="LogInImage">
        <img class="Image" src="../Images/pexels-pixabay-268533.jpg" alt="Background Image of a tree in the dark.">

    </div>
<!--    <h1 id = "Title">Chirpify</h1>-->
    <div class="LogIn">

        <form action="Verwerk.php" class="Form" method="post">

            <h2 class="CenterItem">Log in to continue</h2>
            <label for="Email">Email Adress </label>
            <input type="email" id="Email" name="Email"  required>

            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password"  required>

            <a href="Register.php" class="RegisterButton">Register here</a>

            <label for="Submit"></label>
            <input  type="submit"  id="Submit" value="Log in">


        </form>
    </div>
</div>

</body>
</html>