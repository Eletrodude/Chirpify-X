<?php

session_start();

$username = 'root';
$password = '';





function CheckIfAccountExists($Email, $Username, $Database)
{
    $Email_Query = 'SELECT COUNT(*) FROM user_information WHERE Email = :Email';
    $Email_Statement = $Database->prepare($Email_Query);
    $Email_Statement->bindParam(':Email', $Email);
    $Email_Statement->execute();

    $Email_Count = $Email_Statement->fetchColumn();

    $Username_Query = 'SELECT COUNT(*) FROM user_information WHERE Username = :Username';
    $Username_Statement = $Database->prepare($Username_Query);
    $Username_Statement->bindParam(':Username', $Username);
    $Username_Statement->execute();

    $Username_Count = $Username_Statement->fetchColumn();

    if ($Email_Count > 0) {

        return 'Email Exists';
    } elseif ($Username_Count > 0) {

        return 'Username Exists';
    } else {
        return true;
    }
}

$Var;





try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_SESSION['Register'] == true ){
        $Var = true;
        if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            echo 'Error: Invalid email';
            $_SESSION['Error'] = 'Email invalid';

            return;
        } elseif (strlen($_POST['password']) < 8) {
            echo 'Error: Invalid password';
            $_SESSION['Error'] = 'Password invalid';

            return;
        } elseif ($_POST['password'] != $_POST['confirm_password']) {
            echo 'Error: Passwords do not match';
            $_SESSION['Error'] = 'Passwords do not match';
            header('location: ../Php/Register.php');
            return;
        }
    }else{
        $Var = false;
        return;
    }
    
    if ($Var == true){
        

    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql =
        "INSERT INTO user_information (First_Name,Last_Name,Birth_Date,Country_Of_Residence,Email,Username,Password) 
        VALUES (:First_Name,:Last_Name,:Birth_Date,:Country_Of_Residence,:Email,
            :Username,:Password) ";



    $insert_user = $conn->prepare($sql);

    $insert_user->bindParam(':Username', $_POST['username']);
    $insert_user->bindParam(':Email', $_POST['email']);
    $insert_user->bindParam(':Password', $hash);
    $insert_user->bindParam(':First_Name', $_POST['first_name']);
    $insert_user->bindParam(':Last_Name', $_POST['last_name']);
    $insert_user->bindParam(':Birth_Date', $_POST['birth_date']);
    $insert_user->bindParam(':Country_Of_Residence', $_POST['country_of_residence']);
    


    $insert_user->execute();

    echo "User registered successfully";
    $User_Id = $conn->lastInsertId();
    echo "User registered successfully. Your User ID is: " . $User_Id;


    $_SESSION['User-ID'] = '';
    $_SESSION['Email'] = '';
    $_SESSION['Username'] = '';
    $_SESSION['Error'] = ""; 
    header("location: ../index.php");
    exit();

    }else{
        return;
    }
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
