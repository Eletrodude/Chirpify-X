<?php session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/MainPage.css">
    <link rel="stylesheet" href="../CSS/Folder.css">

    <title>Chirpify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="../JavaScript/Settings.js">

    </script>


</head>

<body>



    <div class="Parent">

        <?php require '../Partials/Sidebar.php' ?>

        <header class="Header">
            <h2>Settings</h2>
        </header>

        <div class="Setting">

            <div class="SettingHeader">
                <h3>Profile Settings</h3>
            </div>

            <div class="SettingSection">

                <div class="SettingPart">
                    <h5>Change Profile Picture</h5>
                    <P>This changes the profile picture for the user!</P>


                    <div>
                        <img src="../Assets/Images/Temp.webp" alt="" class="ProfileImage">
                        <button class="ProfileButton"> Change Profile Picture</button>
                    </div>


                </div>

                <div class="SettingPart">
                    <h5>Change Display name</h5>
                    <P>This changes the Display name for the user!</P>
                </div>

                <div class="SettingPart">
                    <h5>Change Username</h5>
                    <P>This changes the Username for the user!</P>
                </div>

                <div class="SettingPart">
                    <h5>Add bio</h5>
                    <P>This adds a Bio for the user!</P>
                </div>

                <div class="SettingPart">
                    <h5>Change Country of Residence</h5>
                    <P>This changes the Country of Residence for the user!</P>
                </div>
            </div>

            <div class="SettingHeader">
                <h3>Account Settings</h3>
            </div>

            <div class="SettingSection">

                <div class="SettingPart">
                    <h5>Change Password</h5>
                    <P>This changes the password for the user!</P>
                </div>

                <div class="SettingPart">
                    <h5>Add phone number</h5>
                    <P>This adds a phone number to the user's account!</P>
                </div>


                <div class="SettingHeader">
                    <h3>Display Settings</h3>
                </div>

                <div class="SettingSection">

                    <div class="SettingPart">
                        <h5>Toggle Dark Mode</h5>
                        <P>This toggles or untoggles dark mode.</P>
                    </div>

                    <div class="SettingPart">
                        <h5>Font Size</h5>
                        <P>This changes the font size for the user.</P>
                    </div>


                </div>
            </div>






        </div>
    </div>



</body>

</html>