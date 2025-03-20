<?php
$username = 'root';
$password = '';
$host = 'localhost';

try{
    $conn = new PDO("mysql:host=$host;dbname=Chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql =
        'INSERT INTO data (First_Name,Last_Name,Birth_Date,Country_Of_Residence,Email,Username,Password,
                  Telephone_Number)
    VALUES (:First_Name,:Last_Name,:Birth_Date,:Country_Of_Residence,:Email,:Username,:Password,:Telephone_Number) ';

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    


}catch (PDOException $e){
    echo "Connection failed:";
}



