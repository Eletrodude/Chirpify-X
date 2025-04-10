<?php

session_start();

$username = 'root';
$password = '';


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    echo'Error: Invalid email';
    return;
}

 elseif(strlen($_POST['password']) < 8) {
    echo'Error: Invalid password';
    return;
}

elseif($_POST['password'] != $_POST['confirm_password']) {
    echo'Error: Passwords do not match';
    header('location: ../pHP-HTML/register.html');
    return;
}



function CheckIfAccountExists($Email,$Username,$Database) {
    $Email_Query = 'SELECT COUNT(*) FROM user_information WHERE Email = :Email';
    $Email_Statement = $Database ->prepare($Email_Query);
    $Email_Statement -> bindParam(':Email', $Email);
    $Email_Statement ->execute();

    $Email_Count = $Email_Statement -> fetchColumn();




    $Username_Query = 'SELECT COUNT(*) FROM user_information WHERE Username = :Username';
    $Username_Statement = $Database ->prepare($Username_Query);
    $Username_Statement -> bindParam(':Username', $Username);
    $Username_Statement ->execute();

    $Username_Count = $Username_Statement -> fetchColumn();

    if ($Email_Count > 0){

        echo'Email exists';
        return 'Email Exists';


    } elseif ($Username_Count > 0 ){
        echo 'Username Exists';
        return 'Username Exists';



    }else {

        return true;
    }



}







try{
    $conn = new PDO("mysql:host=localhost;dbname=Chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);


    $sql =
        "INSERT INTO user_information (First_Name,Last_Name,Birth_Date,Country_Of_Residence,Email,Username,Password,
         Telephone_Number) 
        VALUES (:First_Name,:Last_Name,:Birth_Date,:Country_Of_Residence,:Email,
            :Username,:Password,:Telephone_Number) ";


   $Var =  CheckIfAccountExists($_POST['email'],$_POST['username'],$conn);

    if ($Var == 'Email Exists') {
        echo ' Email taken';
        header('location: ../PhP/Register.php');
        return;
    } elseif($Var == 'Username Exists'){
        echo 'Username taken';
        header('location: ../PhP/Register.php');
        return;

    }


    $insert_user = $conn->prepare($sql);

    $insert_user->bindParam(':Username',$_POST['username']);
    $insert_user->bindParam(':Email',$_POST['email']);
    $insert_user->bindParam(':Password',$hash);
    $insert_user->bindParam(':First_Name',$_POST['first_name']);
    $insert_user->bindParam(':Last_Name',$_POST['last_name']);
    $insert_user->bindParam(':Birth_Date',$_POST['birth_date']);
//    $insert_user->bindParam(':Confirm_Password',$_POST['confirm_password']);
    $insert_user->bindParam(':Country_Of_Residence', $_POST['country_of_residence']);
    $insert_user->bindParam(':Telephone_Number', $_POST['telephone_number']);

    $insert_user->execute();

    echo "User registered successfully";
    $User_Id = $conn->lastInsertId();
    echo "User registered successfully. Your User ID is: " . $User_Id;
    

   header("location: ../PhP/Main.php");
   exit()

;
}catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}



