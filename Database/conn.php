<?php
$username = 'root';
$password = '';





try{
    $conn = new PDO("mysql:host=localhost;dbname=Chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $hash = password_hash($_POST['Password'],PASSWORD_DEFAULT);


    $sql =
        'INSERT INTO data (First_Name,Last_Name,Birth_Date,Country_Of_Residence,Email,Username,Password,
                  Telephone_Number)


    VALUES (:First_Name,:Last_Name,:Birth_Date,:Country_Of_Residence,:Email,:Username,:Password,:Telephone_Number) ';



    $insert_user = $conn-->bindParam(':Username',$_POST['Username']);
    $insert_user = $conn-->bindParam(':Email',$_POST['Email']);
    $insert_user = $conn-->bindParam(':Password',$hash);
    $insert_user = $conn-->bindParam(':First_Name',$_POST['First_Name']);
    $insert_user = $conn-->bindParam(':Last_Name',$_POST['Last_Name']);
    $insert_user = $conn-->bindParam(':Birth_Date',$_POST['Birth_Date']);
    $insert_user = $conn-->bindParam(':Confimr_Password',$_POST['Confirm_Password'])















    $stmt = $conn->prepare($sql);
    $stmt->execute();

    


}catch (PDOException $e){
    echo "Connection failed:";
}



