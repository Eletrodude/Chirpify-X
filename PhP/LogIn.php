
<?php 
session_start();
$Error = $_SESSION['Error'];

if ($Error == '')

?>
<div class="Parent">

    <div class="LogInImage">
        <img class="Image" src="./Assets/Images/pexels-pixabay-268533.jpg" alt="Background Image of a tree in the dark.">

    </div>
    <!--    <h1 id = "Title">Chirpify</h1>-->
   <div class="LogIn">

        <form action="./Database/LoginVerify.php" class="Form" method="post">

            <h2 class="CenterItem">Log in to continue</h2>
            <label for="text">Username or Email</label>
            <input type="text" id="text" name="text"  required>

            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password"  required>

            <a href="./php/Register.php" class="RegisterButton">Register here</a>

            <label for="Submit"></label>
            <input  type="submit"  id="Submit" value="Log in">


        </form>
    </div>

    
</div>

