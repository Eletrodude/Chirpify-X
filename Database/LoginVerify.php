<?php 

require 'conn.php';
$_SESSION['Register'] = false;
$Variable = $_POST['text'];
$Password = $_POST['Password'];

function VerifyVariable($VariableUsed,$Password){
    global $conn;
    if (filter_var($VariableUsed,FILTER_VALIDATE_EMAIL)) {
        $Query =  'SELECT * FROM user_information WHERE Email = :Identifier';
      
    }else{
        $Query = 'SELECT * FROM user_information WHERE Username = :Identifier';
    }

    $Statement = $conn->prepare($Query);
    $Statement->bindParam(':Identifier',$VariableUsed);
    $Statement->execute();

    $User = $Statement->fetch(PDO::FETCH_ASSOC);

    if ($User && password_verify($Password,$User['Password'])) {
        $_SESSION['User_ID'] = $User['User_ID']; 
        $_SESSION['Username'] = $User['Username'];
        $_SESSION['Email'] = $User['Email'];
        $_SESSION['Logged_In'] = true;
        return true;
    }else{

        return false;
    }

   




};


$LoggedIn = VerifyVariable($Variable,$Password);

if ($LoggedIn == true){
    $_SESSION['Error'] = '';
    header('location: ../PhP/Main.php');

}else{
    $_SESSION['Error'] = 'Invalid User/Email or Password';
    header('location: ../index.php');
}

?>
